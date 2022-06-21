<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Chat;
use App\Models\Admins;
use Auth;
use Illuminate\Support\Facades\Crypt;
use App\Traits\FileManagerTrait;
use DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use PharIo\Manifest\Author;
use Illuminate\Support\Collection;


class ChatController extends Controller
{
  use FileManagerTrait;

 public function chat($u1,$u2){

   $u1 = Crypt::decrypt($u1) / 1244;
   $u2 = Crypt::decrypt(Crypt::decrypt($u2)) / 1244;



  if($u1 == Auth::user()->id || $u2 == Auth::user()->id){
  $conversation = Chat::conversations()->between(Admins::find($u1),Admins::find($u2));
  if($conversation){

    $participants = $conversation->getParticipants();
    if($participants->contains('id', Auth::user()->id)){
      return view('chat')->with('u1',Crypt::encrypt($u1*1244))->with('u2',Crypt::encrypt($u2*1244))->with('admin',Crypt::encrypt(Auth::user()->id*1244));
    }
    else{
      return redirect()->back();
    }
  }
  else{
    Chat::createConversation([Admins::find($u1),Admins::find($u2)]);
      return view('chat')->with('u1',Crypt::encrypt($u1*1244))->with('u2',Crypt::encrypt($u2*1244))->with('admin',Crypt::encrypt(Auth::user()->id*1244));
}
}
else{
  return redirect()->back();
}
  }

 public function sendmessage($u1,$u2,Request $req){
  $u1 = Crypt::decrypt($u1) / 1244;
  $u2 = Crypt::decrypt($u2) / 1244;
$user = auth()->user();
   $type = "";
   if($req->hasFile('file')) { $type = "file"; $text = $this->storeFile($req->file('file'),'img');}
   else{
     $type = 'text'; $text = filter_var($req->text,FILTER_SANITIZE_STRING);
   }
  $conversation = Chat::conversations()->between(Admins::find($u1),Admins::find($u2));
  if($u1 == $user->id || $u2 == $user->id){
  if($conversation){
    $participants = $conversation->getParticipants();
if($participants->contains('id',$user->id)){
    $message = Chat::message($text)
		->type($type)
		->from($user)
		->to($conversation)
		->send();
  }
  else{
  return redirect()->back();
  }
}
  else{
    $conversation = Chat::createConversation([Admins::find($u1),Admins::find($u2)])->makeDirect();
    $message = Chat::message(filter_var($req->text,FILTER_SANITIZE_STRING))
		->type('file')
		->from($user)
		->to($conversation)
		->send();
  }
  return $text;
 }
 else{
   return redirect()->back();
 }
}
 public function getchat($u1,$u2,Request $req){

     $u1 = Crypt::decrypt($u1) / 1244;

     $u2 = Crypt::decrypt($u2) / 1244;


    $admin1 = Admins::find($u1);
    $admin2 = Admins::find($u2);
    $conversation = Chat::conversations()->between(Admins::find($u1),Admins::find($u2));


if($conversation != null){
  $data = DB::table('chat_participation')
  ->join('chat_messages','chat_participation.id','chat_messages.participation_id')
  ->where('chat_messages.conversation_id',$conversation->id)
  ->orderBy('chat_messages.created_at','asc')
  ->select('chat_messages.body','chat_messages.type','chat_participation.messageable_id')
  ->paginate(70);
  $data['cnt'] = count($data->items());
}
else{
$data = null;
$data['cnt'] = 0;
}








return $data;



 }

}
