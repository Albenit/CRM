<?php
use App\Http\Controllers\FinanceController;

use App\Models\Admins;
use Illuminate\Http\Request;

route::post('addProvision',[\App\Http\Controllers\FinanceController::class,'addProvision'])->name('addProvision')->middleware('role:admin');
route::get('finance',function (Request $req){
    $groups = \App\Models\Group::get();

    if(isset($req->date)){

    $provisions = \App\Models\Provisions::where('from','>=',Carbon\Carbon::createFromFormat('Y-m',substr($req->date,0,7))->format('Y-m'))->get();
}
    else{
        $provisions = \App\Models\Provisions::where('from','>=',Carbon\Carbon::now()->subDays(30)->format('Y-m'))->get();
    }
    $admins = \App\Models\Admins::role(['fs'])->get();
    return view('finance',compact('admins','groups','provisions'));
})->name('finance')->middleware('role:admin');
route::get('group/delete/{id}',function ($id){
    \App\Models\Group::find($id)->delete();
    Admins::where('group_id',$id)->update(['group_id'=> 0 ]);
    return redirect()->back();
})->name('group.delete')->middleware('role:admin');
route::get('provision/delete/{id}',function ($id){
    \App\Models\Provisions::find($id)->delete();
    return redirect()->back();
})->name('provision.delete')->middleware('role:admin');
route::post('addGroup',[\App\Http\Controllers\FinanceController::class,'addGroup'])->name('addGroup')->middleware('role:admin');
route::get('finstatus/{id}',function ($id){
    $companies = \App\Models\Companies::where('prov_id',$id)->get();

    return view('finstatus',compact('companies','id'));
})->name('finstatus')->middleware('role:admin');
route::get('register/{id}',[\App\Http\Controllers\FinanceController::class,'register'])->name('companies.register')->middleware('role:admin');
route::post('updateGroup/{id}',[\App\Http\Controllers\FinanceController::class,'updategroup'])->name('update.group')->middleware('role:admin');
route::get('getgrund',function (){
    $companies = \App\Models\Companies::where('field','Grund')->get();
  return $companies;
})->name('getgrund');
route::post('updatecompany/{id}',[FinanceController::class,'updatecompany'])->name('updatecompany');
?>
