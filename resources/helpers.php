<?php

use Illuminate\Support\Facades\Cache;

if(!function_exists('f_salary')){
     function f_salary($sum,$per){
        $sum = $sum / 100;
        return $sum * (100 - $per);
    }
}

if(!function_exists('findgrund')){
    function findgrund($com,$model,$val){
       $per = \App\Models\Companies::where('company_name',$com)->where('field',$model)->where('prov_id',auth()->user()->provision->id)->first();

      if($model == 'Ru'){
          if(auth()->user()->hasRole('fs')) return 200;
          else return $val;
      }
       elseif($per && auth()->user()->hasRole('fs')){
       return f_salary($val,$per->provision_percent);
       }
       else{
           return $val;
       }
        }
}
if(!function_exists('getsalary')){
    function getsalary($com,$model,$val,$p_id){
        $per = \App\Models\Companies::where('company_name',$com)->where('field',$model)->where('prov_id',$p_id)->first();

        if($model == 'Ru'){
            if(auth()->user()->hasRole('fs')) return 200;
            else return $val;
        }
        elseif($per){
            return f_salary($val,$per->provision_percent);
        }
        else{
            return $val;
        }
    }
}
function days($date1,$date2){
    $created_at =  \Carbon\Carbon::createFromFormat('Y-m-d',$date1);
            $duration_time = \Carbon\Carbon::createFromFormat('Y-m-d',$date2);

            return (int) date_diff($created_at,$duration_time)->format('%d');
}
    function keineStatus($grundversicherungP,$zusatzversicherungP,$hausratP,$autoversicherungPPFirst,$vorsorgeP,$retchsschutzP){

        return ($grundversicherungP->society_PG == null || $grundversicherungP->graduation_date_PG == null || $grundversicherungP->product_PG == null  || ( $grundversicherungP->status_PG == 'Offen (Berater)' && $grundversicherungP->status_PG == 'Offen (Innendienst)'))
        && ($zusatzversicherungP->society_PZ == null || $zusatzversicherungP->product_PZ == null || $zusatzversicherungP->graduation_date_PZ == null || ( $zusatzversicherungP->status_PZ == 'Offen (Berater)' && $zusatzversicherungP->status_PZ == 'Offen (Innendienst)'))
        && ($retchsschutzP->society_PR == null || $retchsschutzP->graduation_date_PR == null || $retchsschutzP->product_PR == null || ( $retchsschutzP->status_PR == 'Offen (Berater)' && $retchsschutzP->status_PR == 'Offen (Innendienst)'))
        && ($autoversicherungPPFirst->society_PA == null || $autoversicherungPPFirst->graduation_date_PA == null || $autoversicherungPPFirst->product_PA == null || (  $autoversicherungPPFirst->status_PA == 'Offen (Berater)' &&  $autoversicherungPPFirst->status_PA == 'Offen (Innendienst)'))
        && ($hausratP->society_PH == null || $hausratP->graduation_date_PH == null || $hausratP->product_PH == null || ( $hausratP->status_PH == 'Offen (Berater)' && $hausratP->status_PH == 'Offen (Innendienst)'))
        && ($vorsorgeP->society_PV == null || $vorsorgeP->product_PV == null || $vorsorgeP->graduation_date_PV == null  || ( $vorsorgeP->status_PV == 'Offen (Berater)' && $vorsorgeP->status_PV == 'Offen (Innendienst)'));

    }

    function keineStatusEdit($grundversicherungPP,$zusatzversicherungPP,$hausratP,$autoversicherungPPFirst,$vorsorgeP,$retchsschutzP){

        return ($grundversicherungPP->society_PG == null || $grundversicherungPP->graduation_date_PG == null || $grundversicherungPP->product_PG == null  || ( $grundversicherungPP->status_PG == 'Offen (Berater)' && $grundversicherungPP->status_PG == 'Offen (Innendienst)'))
            && ($zusatzversicherungPP->society_PZ == null || $zusatzversicherungPP->product_PZ == null || $zusatzversicherungPP->graduation_date_PZ == null || ( $zusatzversicherungPP->status_PZ == 'Offen (Berater)' && $zusatzversicherungPP->status_PZ == 'Offen (Innendienst)'))
            && ($retchsschutzP->society_PR == null || $retchsschutzP->graduation_date_PR == null || $retchsschutzP->product_PR == null || ( $retchsschutzP->status_PR == 'Offen (Berater)' && $retchsschutzP->status_PR == 'Offen (Innendienst)'))
            && ($autoversicherungPPFirst->society_PA == null || $autoversicherungPPFirst->graduation_date_PA == null || $autoversicherungPPFirst->product_PA == null || (  $autoversicherungPPFirst->status_PA == 'Offen (Berater)' &&  $autoversicherungPPFirst->status_PA == 'Offen (Innendienst)'))
            && ($hausratP->society_PH == null || $hausratP->graduation_date_PH == null || $hausratP->product_PH == null || ( $hausratP->status_PH == 'Offen (Berater)' && $hausratP->status_PH == 'Offen (Innendienst)'))
            && ($vorsorgeP->society_PV == null || $vorsorgeP->product_PV == null || $vorsorgeP->graduation_date_PV == null  || ( $vorsorgeP->status_PV == 'Offen (Berater)' && $vorsorgeP->status_PV == 'Offen (Innendienst)'));

    }
    function cachee(){
return Cache::get('paginationCount');
    }

?>


