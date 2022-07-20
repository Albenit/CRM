<?php

namespace App\Http\Controllers;

use App\Enums\FolderPaths;
use App\Jobs\SendEmp;
use App\Mail\EmpChanged;
use App\Models\Absence;
use App\Models\Admins;
use App\Models\BankInformation;
use App\Models\bestellungen;
use App\Models\EmployeePersonalData;
use App\Models\LogsActivity;
use App\Models\options_bestellungen;
use App\Notifications\SendNotificationn;
use App\Traits\FileManagerTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;


class HumanResourcesController extends Controller
{
    use FileManagerTrait;
    public function acceptbestellung($id){
       bestellungen::find($id)->update(['type' => 1]);
       return redirect()->back();
    }
    public function updateinfo(Request $request){
        $existingBankInformation = BankInformation::firstWhere('employee_id', auth()->id());
        if($existingBankInformation) {
            $newBankInformation = [
                'bank' => $request->bank ? $request->bank : $existingBankInformation->bank,
                'iban' => $request->iban ? $request->iban : $existingBankInformation->iban,
            ];
            $existingBankInformation->update($newBankInformation);
        }
        else{
            BankInformation::create(['employee_id' => auth()->id(),
                'bank' => $request->bank ? $request->bank : null,
                'iban' => $request->iban ? $request->iban : $existingBankInformation->iban,
                'cc_number' => $request->cc_number ? $request->cc_number : null,
                'cc_name' => $request->cc_name ? $request->cc_name : null
            ]);
        }

        $existinginfo = EmployeePersonalData::firstWhere('admin_id', auth()->id());
        $existinginfo->update([
        'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'zip' => $request->zip
        ]);
        return redirect()->back()->with('success','Aktion erfolgreich abgeschlossen');
    }
    public function rejectbestellung($id){
        bestellungen::find($id)->update(['type' => 2]);
        return redirect()->back();
    }

    public function createAbsence(Request $request)
    {   
        $request->validate([
            'from' => 'required',
            'to' => 'required'
        ],
        [   
            'from.required' => 'Date is required',
            'to.required' => 'Date is required'
        ]
    );

        $decryptedEmployeeId = $request->employeeId;
        $emp  = auth()->user();
        $created_at =  Carbon::createFromFormat('Y-m-d',$request->from);
        $duration_time = Carbon::createFromFormat('Y-m-d',$request->to);

        $absence = Absence::where('employee_id', $emp->id)->where('type',1)->latest()->first();

        if($absence == null || $absence->to < Carbon::now()){
            $duration =  (int) date_diff($created_at,$duration_time)->format('%d');
            if($duration > 7) $type = 0; else $type = 1;
            
            $absence = new Absence();
            $absence->employee_id = $emp->id;
            $absence->from = $request->from;
            $absence->to = $request->to;
            $absence->file = $request->hasFile('begrundungfile2') ? $this->storeFile($request->file('begrundungfile2'),FolderPaths::KK_FILES) : null;
            $absence->type = $type;
    
            if ($request->descriptionSelect != null) {
                $absence->description = $request->descriptionSelect;
            }else {
                $absence->description = $request->description;
            }
            $absence->save();
    
    
               foreach (Admins::role(['backoffice'])->get() as $admin){
               $text = '<a href="' . route('hr_view') . '">Es liegt eine Abwesenheitsanfrage von ' . ucfirst(auth()->user()->name) .' vor</a>';
                   $admin->notify(new SendNotificationn($text));
               }
            return redirect()->back()->with('absenceSuccess','Ihr Abwesenheitsantrag wurde erfolgreich bearbeitet');

        }else{
            return redirect()->back()->with('absenceFail','You cant do absence until this date '.$absence->to.' because you are on vacation');
        }


    }

    public function updateAbsenceById(Request $request)
    {
        $employeeId = $request->employeeId;
        $absenceId = $request->absenceId;

        $existingEmployeeAbsence = Absence::where('id', $absenceId)->where('employee_id', $employeeId)->first();

        $newAbsenceData = [
            'from' => $request->from ? $request->from : $existingEmployeeAbsence->from,
            'to' => $request->to ? $request->to : $existingEmployeeAbsence->to,
            'type' => $request->type ? $request->type : $existingEmployeeAbsence->type,
            'description' => $request->description ? $request->description : $existingEmployeeAbsence->description
        ];

        if($existingEmployeeAbsence){
            $existingEmployeeAbsence->update($newAbsenceData);
        }else{
            return 'No absence data found';
        }
    }

    public function getAllEmployeeAbsences(Request $request)
    {
        $employeeId = $request->employeeId;
        $decryptedEmployeeId = Crypt::decrypt($employeeId);
        $decryptedEmployeeId /= 1244;
        return Absence::where('employee_id', $employeeId)->get();
    }
    public function approveAbsense(Request  $req){
        $absence =  Absence::find($req->ab_id)->update(['type' => 1]);
        $absence1 =  (int) Absence::find($req->ab_id)->employee_id;
        Admins::find($absence1)->notify(new SendNotificationn('<a href="' . route('hr_view') . '"> Ihr Abwesenheitsantrag wurde genehmigt !</a>'));
        return redirect()->back();
    }
    public function declineAbsense(Request  $req){
        $absence = Absence::find($req->ab_id1)->update(['type' => 2]);
        $absence1 =  (int) Absence::find($req->ab_id1)->employee_id;
        Admins::find($absence1)->notify(new SendNotificationn('<a href="' . route('hr_view') . '"> Ihr Abwesenheitsantrag wurde abgelehnt !</a>'));
        return redirect()->back();
    }

    public function acceptAbsense($id){

        Absence::find($id)->update(['type' => 1]);
        $absence1 =  (int) Absence::find($id)->employee_id;
        Admins::find($absence1)->notify(new SendNotificationn('<a href="' . route('hr_view') . '"> Ihr Abwesenheitsantrag wurde genehmigt !</a>'));
        return redirect()->back();
    }

    public function cancelAbsence($id){
        Absence::find($id)->update(['type' => 2]);
        $absence1 =  (int) Absence::find($id)->employee_id;

        Admins::find($absence1)->notify(new SendNotificationn('<a href="' . route('hr_view') . '"> Ihr Abwesenheitsantrag wurde abgelehnt !</a>'));
        return redirect()->back();
    }

    public function removeAbsence(Request $request)
    {
        $employeeId = $request->employeeId;

        $decryptedEmployeeId = Crypt::decrypt($employeeId);
        $decryptedEmployeeId /= 1244;

        $absence = Absence::firstWhere('employee_id', $decryptedEmployeeId);
        return $absence->delete();
    }

    public function addBankInformationData(Request $request)
    {
        $employeeId = $request->id ? $request->id : auth()->user()->id;

        $bankData = BankInformation::create([
            'employee_id' => $employeeId,
            'bank' => $request->bank,
            'iban' => $request->iban
        ]);

        if($bankData){
            return [
                'message' => 'Bank Data was added successfully.',
                'data' => $bankData
            ];
        }
    }

    public function updateBankInformation(Request $request)
    {
        $employeeId = $request->id;

        $existingBankInformation = BankInformation::firstWhere('employee_id', $employeeId);
        if($existingBankInformation) {
            $newBankInformation = [
                'bank' => $request->bank ? $request->bank : $existingBankInformation->bank,
                'iban' => $request->iban ? $request->iban : $existingBankInformation->iban,
                'cc_number' => $request->cc_number ? $request->cc_number : $existingBankInformation->cc_number,
                'cc_name' => $request->cc_name ? $request->cc_name : $existingBankInformation->cc_name
            ];
            $existingBankInformation->update($newBankInformation);
        }
        else{
            BankInformation::create(['employee_id' => $employeeId,
                'bank' => $request->bank ? $request->bank : null,
                'iban' => $request->iban ? $request->iban : $existingBankInformation->iban,
                'cc_number' => $request->cc_number ? $request->cc_number : $existingBankInformation->cc_number,
                'cc_name' => $request->cc_name ? $request->cc_name : $existingBankInformation->cc_name
            ]);
        }
        foreach (Admins::role(['backoffice'])->get() as $admin){
            SendEmp::dispatch($admin->email,Admins::find($employeeId)->name)->delay(now()->addSeconds(2));
        }
        if($existingBankInformation){
            return $existingBankInformation->update($newBankInformation);
        }else{
            return 'No Bank Information data found.';
        }
    }

    public function getEmployeeBankInformation($id)
    {
        $bankInfo = BankInformation::where('employee_id', $id)->get();
        $bankData['bankData'] = $bankInfo;
        return redirect()->back();
    }

    public function updatePersonalData(Request $request){
        if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('backoffice')){


            $personalData = EmployeePersonalData::where('admin_id',$request->emp_id)->first();

            EmployeePersonalData::where('admin_id',$request->emp_id)->update([
                'name' => $request->name,
                'prename' => $request->prename,
                'address' => $request->address,
                'email' => $request->email,
                'zip' => $request->zip,
                'city' => $request->city,
                'phone' => $request->phone,
                'language' => $request->language,
                'job_position' => $request->job_position,
                'birthdate' => $request->birthdate,
                'profile_picture' => $request->hasFile('profile_picture') ? $this->storeFile($request->file('profile_picture'), 'imgs') : $personalData->profile_picture,
            ]);

            $bankInfo = \App\Models\BankInformation::where('employee_id',$request->emp_id)->first();
            if ($bankInfo != null ) {
                if ($bankInfo->employee_id == $request->emp_id) {
                    $bankinfo = BankInformation::where('employee_id',$request->emp_id)->update([
                        'bank' => $request->bank_name,
                        'iban' => $request->iban_number
                    ]);
                }
            }else{
                $bankinfo = BankInformation::create([
                    'employee_id' => $request->emp_id,
                    'bank' => $request->bank_name,
                    'iban' => $request->iban_number
                ]);
            }

            Admins::where('id',$request->emp_id)->update([
                'name' => $request->name
            ]);
        }else{
            $admini = Admins::find(auth()->user()->id);
            if($admini->admin_id == null){
                $personalData = EmployeePersonalData::where('admin_id',auth()->user()->id)->first();
                EmployeePersonalData::where('admin_id',auth()->user()->id)->update([
                    'name' => $request->name,
                    'prename' => $request->prename,
                    'address' => $request->address,
                    'email' => $request->email,
                    'zip' => $request->zip,
                    'city' => $request->city,
                    'phone' => $request->phone,
                    'language' => $request->language,
                    'job_position' => $request->job_position,
                    'birthdate' => $request->birthdate,
                    'profile_picture' => $request->hasFile('profile_picture') ? $this->storeFile($request->file('profile_picture'), 'imgs') : $personalData->profile_picture,
                ]);
                $bankInfo = \App\Models\BankInformation::where('employee_id',auth()->user()->id)->first();
                if ($bankInfo != null ) {
                    if ($bankInfo->employee_id == auth()->user()->id) {
                        $bankinfo = BankInformation::where('employee_id',auth()->user()->id)->update([
                            'bank' => $request->bank_name,
                            'iban' => $request->iban_number
                        ]);
                    }
                }else{
                    $bankinfo = BankInformation::create([
                        'employee_id' => auth()->user()->id,
                        'bank' => $request->bank_name,
                        'iban' => $request->iban_number
                    ]);
                }
            }else{
                $personalData = EmployeePersonalData::where('admin_id',auth()->user()->headadmin->id)->first();
                EmployeePersonalData::where('admin_id',auth()->user()->headadmin->id)->update([
                    'name' => $request->name,
                    'prename' => $request->prename,
                    'address' => $request->address,
                    'email' => $request->email,
                    'zip' => $request->zip,
                    'city' => $request->city,
                    'phone' => $request->phone,
                    'language' => $request->language,
                    'job_position' => $request->job_position,
                    'birthdate' => $request->birthdate,
                    'profile_picture' => $request->hasFile('profile_picture') ? $this->storeFile($request->file('profile_picture'), 'imgs') : $personalData->profile_picture,
                ]);
                $bankInfo = \App\Models\BankInformation::where('employee_id',auth()->user()->headadmin->id)->first();
                if ($bankInfo != null ) {
                    if ($bankInfo->employee_id == auth()->user()->headadmin->id) {
                        $bankinfo = BankInformation::where('employee_id',auth()->user()->headadmin->id)->update([
                            'bank' => $request->bank_name,
                            'iban' => $request->iban_number
                        ]);
                    }
                }else{
                    $bankinfo = BankInformation::create([
                        'employee_id' => auth()->user()->headadmin->id,
                        'bank' => $request->bank_name,
                        'iban' => $request->iban_number
                    ]);
                }
            }

           

            
            
            Admins::where('id',auth()->user()->id)->update([
                'name' => $request->name
            ]);
    }





        if($personalData){
            return redirect()->back()->with('success','Persönliche Daten erfolgreich aktualisiert');
        }
    }

    public function getEmployeePersonalDataById(Request $request)
    {

        $employeeId = $request->id;
        $data = EmployeePersonalData::firstWhere('admin_id', $employeeId);
        $bank = BankInformation::firstWhere('employee_id',$employeeId);
        $data['id'] = $employeeId;
        if($bank){
            $data['iban'] = $bank['iban'];
            $data['bank'] = $bank['bank'];
            $data['cc_number'] = $bank['cc_number'];
            $data['cc_name'] = $bank['cc_name'];
        }
        else {
            $data['iban'] = "";
            $data['bank'] = "";
            $data['cc_number'] = "";
            $data['cc_name'] = "";
        }

        return $data;
    }


//    public function getAllEmployees()
//    {
//        dd(2);
//        $empData = EmployeePersonalData::all()->get();
//        return redirect()->route('hr_view')->with('empData',$empData);
//
//    }

    public function getHRs($id){

        $employees = EmployeePersonalData::where('admin_id', $id)->get();

        // Fetch all records
        $userData['data'] = $employees;

        echo json_encode($userData);
        exit;
    }

//    public function updatePersonalData(Request $request)
//    {
//        $employeeId = $request->employeeId;
//
//        $decryptedEmployeeId = Crypt::decrypt($employeeId);
//        $decryptedEmployeeId /= 1244;
//
//        $existingPersonalData = EmployeePersonalData::where('id', $decryptedEmployeeId)->first();
//
//        $newPersonalData = [
//            'name' => $request->name ? $request->name : $existingPersonalData->name,
//            'prename' => $request->prename ? $request->prename : $existingPersonalData->prename,
//            'email' => $request->email ? $request->email : $existingPersonalData->email,
//            'address' => $request->address ? $request->address : $existingPersonalData->address,
//            'zip' => $request->zip ? $request->zip : $existingPersonalData->zip,
//            'city' => $request->city ? $request->city : $existingPersonalData->city,
//            'phone' => $request->phone ? $request->phone : $existingPersonalData->phone
//        ];
//
//        if($existingPersonalData){
//            return $existingPersonalData->update($newPersonalData);
//        }else{
//            return 'No personal data found';
//        }
//    }

    public function removePersonalData(Request $request)
    {
        $employeeId = $request->employeeId;

        $decryptedEmployeeId = Crypt::decrypt($employeeId);
        $decryptedEmployeeId /= 1244;

        $personalData = EmployeePersonalData::where('id', $decryptedEmployeeId)->first();
        return $personalData->delete();
    }
    public function addMoreOption(Request $request){
        options_bestellungen::create([
           'employee_id'=> auth()->user()->id,
            'item' => $request->addmore
        ]);
    }
    public function getMoreOption(){
       return options_bestellungen::where('employee_id',auth()->user()->id)->get();
    }
    public function createBestellunge(Request $request){

        $bestellungen = bestellungen::create([
            'employee_id' => auth()->user()->id,
            'item' => $request->moreOptions,
            'reason' => $request->reasonBestellungen
        ]);

        if ($bestellungen) {
            return redirect()->back()->with('successBestellungen', 'Your Bestellungen was successfuly done');
        }

    }

    public function logsHistory(){
        $logsActivity = LogsActivity::all();

        return view('logs_history',['logsActivity' => $logsActivity]);
    }
}
