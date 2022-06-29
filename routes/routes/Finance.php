<?php

route::post('addProvision',[\App\Http\Controllers\FinanceController::class,'addProvision'])->name('addProvision')->middleware('role:admin|backoffice');
route::get('finance',function (){
    $groups = \App\Models\Group::get();
    $provisions = \App\Models\Provisions::get();
    $admins = \App\Models\Admins::role(['fs'])->get();
    return view('finance',compact('admins','groups','provisions'));
})->name('finance');
route::get('group/delete/{id}',function ($id){
    \App\Models\Group::find($id)->delete();
    return redirect()->back();
})->name('group.delete')->middleware('role:admin|backoffice');
route::get('provision/delete/{id}',function ($id){
    \App\Models\Provisions::find($id)->delete();
    return redirect()->back();
})->name('provision.delete')->middleware('role:admin|backoffice');
route::post('addGroup',[\App\Http\Controllers\FinanceController::class,'addGroup'])->name('addGroup')->middleware('role:admin|backoffice');
route::get('finstatus/{id}',function ($id){
    $companies = \App\Models\Companies::where('prov_id',$id)->get();
    return view('finstatus',compact('companies','id'));
})->name('finstatus')->middleware('role:admin|backoffice');
route::post('register/{id}/{field}',[\App\Http\Controllers\FinanceController::class,'register'])->name('companies.register')->middleware('role:admin|backoffice');
route::post('updateGroup/{id}',[\App\Http\Controllers\FinanceController::class,'updategroup'])->name('update.group')->middleware('role:admin|backoffice');
?>
