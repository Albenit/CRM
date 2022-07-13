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
    if(isset($req->members)){
        if(!in_array($member->id,$req->members)){
            $member->group_id = 0;
            $member->save();
        }
    }else{
        Group::find($id)->members()->update(['group_id' => 0]);
    }
    
}
Group::find($id)->update(['provision_id' => $req->input('prov')]);
if(isset($req->members)){
foreach ($req->members as $member){
    
    if(Admins::find($member)->roless != null){
        Admins::find($member)->childrens->each(function($item) use($id){
           $item->group_id = $id;
           $item->save();
        });
    }
	
    Admins::find($member)->update(['group_id'=> $id]);
}
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
		if(isset($req->admins)){
        foreach ($req->admins as $admin){
            $admini = Admins::find($admin);
            if($admini->group_id != 0){
                return back()->with('fail','Der Berater "' . $admini->name . '" ist bereits im Lohnsystem ,,' . $admini->group->name .'“ ! Bitte entferne diesen zuerst. Die Änderung wird Rückwirkend auf Anfang des Monats aktiv!!');
            }
            else{
            if($admini->roless != null){
                $admini->childrens->each(function($item) use($group){
                   $item->group_id = $group->id;
                   $item->save();
                });
            }
            Admins::find($admin)->update(['group_id' => $group->id]);
        }
        }
    }
        return redirect()->back();
    }
    public function register($id,Request $req){

            if(!Companies::firstWhere(['company_name' => $req->company_name,'field' => $req->field,'prov_id' => $id])){
                if($req->company_name != null && $req->provision_percent != null){
            Companies::create(['company_name' => $req->company_name,'provision_percent' => $req->provision_percent,'field' => $req->field,'prov_id' => $id]);
                }
                else{
              return redirect()->back();
                }
            }
    
    return back();
}

public function updatecompany($id,Request $req){
 
       Companies::find($id)->update(['provision_percent' => $req->percent]);
       return back();
}

}
