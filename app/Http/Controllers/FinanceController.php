<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Companies;
use App\Models\Group;
use App\Models\Provisions;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class FinanceController extends Controller
{
    public function addProvision(Request $req){
            
         
            $provisions = new Provisions();
            $provisions->name = $req->name;
            $provisions->from = $req->from;
            $provisions->to = $req->to;
            $provisions->save();

            if(isset($req->groups)) {
                foreach ($req->groups as $group) {
                    $group = Group::find($group)->update(['provision_id' => $provisions->id]);
                }
            }
        return redirect()->back();
    }
    public function updategroup($id,Request $req){

foreach (Group::find($id)->members as $member){
    if(!in_array($member->id,$req->members)){
        $member->group_id = 0;
        $member->save();
    }
    Group::find($id)->update(['provision_id' => $req->input('prov')]);
}

foreach ($req->members as $member){
    
    if(Admins::find($member)->roless != null){
   
        Admins::find($member)->childrens->each(function($item) use($id){
           $item->group_id = $id;
           $item->save();
        });
    }
    Admins::find($member)->update(['group_id'=> $id]);
    
}
return redirect()->back();
    }

    public function addGroup(Request $req){
        $group = new Group();
        $group->salary = (float) $req->salary;
        $group->expenses = (float) $req->expenses;
        $group->name = (string) $req->name;
        $group->provision_id = (int) $req->prov_id;
        $group->save();
        foreach ($req->admins as $admin){
            if(Admins::find($admin)->roless != null){
   
                Admins::find($admin)->childrens->each(function($item) use($group){
                   $item->group_id = $group->id;
                   $item->save();
                });
            }
            Admins::find($admin)->update(['group_id' => $group->id]);
        }
        
        return redirect()->back();
    }
    public function register($id,$field,Request $req){
        $cnt = (int) $req->cnt;

        for ($i = 1; $i <= $cnt; $i++){
            if(!Companies::firstWhere(['company_name' => $req->input('company' . $i),'field' => $field,'prov_id' => $id])){
                if($req->input('company' . $i) != null && $req->input('percent' . $i) != null){
            Companies::create(['company_name' => $req->input('company' . $i),'provision_percent' => $req->input('percent' . $i),'field' => $field,'prov_id' => $id]);
                }
                else{
              return redirect()->back();
                }
            }
    }
    return back();
}

public function updatecompany($id,Request $req){
 
       Companies::find($id)->update(['provision_percent' => $req->percent]);
       return back();
}

}
