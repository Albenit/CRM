<?php

namespace App\Http\Controllers;

use App\Models\family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Webklex\PHPIMAP\ClientManager;

class StatusController extends Controller
{
    public function status(){
        $clientss = family::paginate(40);
        $cm = new ClientManager($options = []);
        $client = $cm->make([
            'host'          => 'imap-mail.outlook.com',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => 'bulzart@outlook.com',
            'password'      => 'paswordi123.',
            'protocol'      => 'imap'
        ]);
        $client->connect();
        $folders = $client->getFolders();


           //Get all Messages of the current Mailbox $folder
           /** @var \Webklex\PHPIMAP\Support\MessageCollection $messages */
           $messages = $folders[3]->messages()->all()->get();

           $cnt = 0;
           $msgs = [];
         $links = [];


           /** @var \Webklex\PHPIMAP\Message $message */
           foreach($messages as $message){
                $msgs[$cnt]['subject'] = $message->getSubject();
               $msgs[$cnt]['attachments'] = $message->getAttachments()->count();
               $msgs[$cnt]['body'] =  $message->getHTMLBody();
              $cnt++;
           }

        return view('status',compact('clientss','msgs'));
    }
    public function editclientdata($id){

        $idd = Crypt::decrypt($id);
        $idd /= 1244;

        $client = family::find($idd);
        return view('editclientdata',compact('client'));
    }
    public function editclientform(Request $request,$id){

        $idd = Crypt::decrypt($id);
        $idd /= 1244;

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $birthdate = $request->birthdate;
        $status = $request->status;

        if(family::find($idd)->update([
            'first_name'=> $first_name,
            'last_name'=>$last_name,
            'birthdate'=>$birthdate,
            'status' => $status
        ])) {
            return redirect()->back()->with('success', 'Kunde erfolgreich bearbeitet');
        }else{
            return redirect()->back()->with('fail', 'Kunde bearbeitet fehlgeschlagen');
        }
    }

}
