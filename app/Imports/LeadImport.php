<?php

namespace App\Imports;

use App\Models\Admins;
use App\Models\campaigns;
use App\Models\lead;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;
use Throwable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LeadImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $latitude,$longitude;

public function niorz(){
    if(Auth::user()->hasRole('fs')) return 1;
    else return 0;
}

public function author(){
    if(Auth::user()->hasRole('fs')) return Auth::user()->id;
    else return null;
}
    public function latitudee($address1){
        try{
        $address = $address1;
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&key=AIzaSyDscxZzYju_pJGNA2zu1lXOqJuubCdPu0o';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $responseJson = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($responseJson);
        if ($response->status == 'OK') {
            $latitude = $response->results[0]->geometry->location->lat;
            $longitude = $response->results[0]->geometry->location->lng;
        }
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
    catch(Throwable $e){
       $this->longitude = 0.00;
       $this->latitude = 0.00;
    }
    }

    public function model(array $row)
    {
        $this->latitudee($row[18]);
        return new lead([
         'created_at' => filter_var($row[1],FILTER_SANITIZE_STRING),
         'updated_at' =>  filter_var($row[2],FILTER_SANITIZE_STRING),
         'agent' => filter_var($row[4],FILTER_SANITIZE_STRING),
         'berater' => filter_var($row[6],FILTER_SANITIZE_STRING),
         'appointment_date' => filter_var(Carbon::parse($row[8])->format('Y-m-d'),FILTER_SANITIZE_STRING),
         'time' => filter_var($row[9],FILTER_SANITIZE_STRING),
         'sprache' => filter_var($row[10],FILTER_SANITIZE_STRING),
         'number_of_persons' => (int) $row[11],
         'nationality' => filter_var($row[12],FILTER_SANITIZE_STRING),
         'first_name' => filter_var($row[14],FILTER_SANITIZE_STRING),
         'last_name' => filter_var($row[13],FILTER_SANITIZE_STRING),
         'address' => filter_var($row[15],FILTER_SANITIZE_STRING),
         'nr' => filter_var($row[16],FILTER_SANITIZE_STRING),
         'postal_code' => (int) $row[17],
         'city' => filter_var($row[18],FILTER_SANITIZE_STRING),
         'telephone' => filter_var($row[19],FILTER_SANITIZE_STRING),
         'bemerkung' => filter_var($row[58],FILTER_SANITIZE_STRING),
         'assigned' => $this->niorz(),
         'campaign_id' => 1,
         'assign_to_id' => $this->author(),
         'latitude' => $this->latitude,
         'longitude' => $this->longitude,
         'slug' => Str::random(7)
        ]);
    }
}
