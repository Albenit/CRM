<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoRequest;
use App\Models\Admins;
use App\Models\Costumer;
use App\Models\family;
use App\Models\ToDoList;
use Illuminate\Http\Request;
use App\Models\todo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function numbers(){
        return todo::where('admin_id',Auth::guard('admins')->user()->id)->get();
    }

    public function addnumber(Request $req){
        if(Auth::guard('admins')->user()->hasRole('admin') || Auth::guard('admins')->user()->hasRole('backoffice'))
        {
        $todo = new todo();
        $todo->costumer = filter_var($req->name, FILTER_SANITIZE_STRING);
        $todo->comment = filter_var($req->position, FILTER_SANITIZE_STRING);
        $todo->number = filter_var($req->company_name, FILTER_SANITIZE_STRING);
        $todo->text = filter_var($req->number,FILTER_SANITIZE_STRING);
        $todo->admin_id = Auth::guard('admins')->user()->id;
        $todo->save();
      }
    }
    public function fsadmins(Request $req){
        return Admins::find((int) $req->admin_id);
    }

      public function deletenumber(Request $req){
        if(Auth::guard('admins')->check()){
            $id = (int) $req->id;
            $todo = todo::find($id);
            if($todo->admin_id == Auth::guard('admins')->user()->id){
            todo::find($id)->delete();}
            else{
                return redirect()->back();
            }
        }
    }

    public function addtodo(ToDoRequest $req){
      $todo = new todo();
      $todo->text = filter_var($req->todo,FILTER_SANITIZE_STRING);
      $todo->admin_id = Auth::guard('admins')->user()->id;
      if($todo->save()){
          return redirect()->route('dashboard')->with('success', 'Erfolgreich eingefügt');
      }else{
          return redirect()->route('dashboard')->with('fail','Fehler beim Einfügen');
      }

    }
    public function todos(Request $req){
        $user = auth()->user()->getRoleNames()->toArray();

            if(in_array('admin',$user) || in_array('backoffice',$user)){
                if(!isset($req->admin_id)){
        $data['costumers'] = family::select('first_name','last_name','id')->orderBy('first_name','asc')->paginate(60);}
        else{
            $data['costumers'] = Admins::find((int) $req->admin_id)->kunden()->paginate(60);
        }
        $data['admins'] = Admins::role(['fs'])->get();
        $data['costumers'] = $data['costumers']->items();
        return $data;
            }

    }
    public function deletetodo(Request $req){
        if(Auth::guard('admins')->check()){
            $id = (int) $req->id;
            $todo = todo::find($id);
            if($todo->admin_id == Auth::guard('admins')->user()->id){
            todo::find($id)->delete();}
            else{
                return redirect()->back();
            }
        }
    }
    public function donetodo(Request $req){
        if(Auth::guard('admins')->check()){
            $id = (int) $req->id;
            $todo = todo::where('id',$id)->get();
            if($todo->assign_to_id == Auth::guard('admins')->user()->id || Auth::guard('admins')->user()->hasRole('admin') || Auth::guard('admins')->user()->hasRole('backoffice')){
            $todo->update(['done' => 1]);
            }
        }
    }

    public function getDataForTaskByCostumerId($costumerId)
    {
        return family::where('id', $costumerId)->first();
    }

    public function createToDoTasks($id, $pendencyId, Request $request)
    {
        $decryptedId = Crypt::decrypt($id);
        $decryptedPendencyId = Crypt::decrypt($pendencyId);

        $data = [
            'admin_id' => $decryptedId,
            'pendency_id' => $decryptedPendencyId,
            'costumer' => $request->costumer,
            'text' => $request->text,
            'comment' => $request->comment,
            'done' => 'Opened'
        ];

        return todo::create($data);
    }

    public function getAllOpenedToDoTasks()
    {
        return todo::where('done', 'Opened')->get();
    }

    public function getAllAnsweredTasks()
    {
        return todo::where('done', 'Answered')->get();
    }

//    ToDo list Methods
    public function addToDoList(Request $request){
        ToDoList::create([
           'admin_id' => Auth::guard('admins')->user()->id,
            'title' => filter_var($request->title, FILTER_SANITIZE_STRING),
        ]);
    }
    public function getToDo(){
        return ToDoList::where('admin_id',Auth::guard('admins')->user()->id)->get();
    }
    public function deleteToDoList(Request $request){
        if(Auth::guard('admins')->check()) {
            $id = $request->id;
            ToDoList::where('id','=',$id)->delete();
        }
    }


}
