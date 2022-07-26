<?php

use App\Models\Admins;
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

       if($per && auth()->user()->hasRole('fs')){
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

        if($per){
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

    function send_notification_FCM($title, $message, $id,$type) {
        $token = Cache::has('tokeni') ? Cache::get('tokeni') : "";
        $token = array($token);
   

        $API_ACCESS_KEY = 'AAAAJLfHeRc:APA91bFnYmKDTJJ04tege9X5JjGdbzCGNmzg_caiZh2c4LnE-Lyyb0Y8DZYBIYMkhxRJQDl4iBxhoNHKBVWLLwpgxHzCO2-ussJJ3FHvhB5IssGhsR0eSo7V15d8XP4cxwbQ6F48wRTb';
 
       
	$header = [
		'Authorization: Key=' . $API_ACCESS_KEY,
		'Content-Type: Application/json'
	];

	$msg = [
		'title' => 'Testing Notification',
		'body' => 'Testing Notification from localhost',
		'icon' => 'img/icon.png',
		'image' => 'imgs/1655823577_62b1dcd97bdcc.jpg',
	];

	$payload = [
		'registration_ids' 	=> $token,
		'data'				=> $msg
	];

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => json_encode( $payload ),
	  CURLOPT_HTTPHEADER => $header
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
  }
  
?>


