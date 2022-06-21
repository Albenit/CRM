<?php

namespace App\Imports;

use App\Models\lead_info;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\lead;
use Maatwebsite\Excel\Concerns\ToModel;

class leadinfo implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $lead = lead::where('first_name',$row[0])->where('last_name',$row[1])->where('birthdate',$row[3])->latest()->first();
      

        return new lead_info([
            'lead_id' => (int) $lead->id,
            'kampagne' => filter_var($row[7],FILTER_SANITIZE_STRING),
            'grund' => filter_var($row[8],FILTER_SANITIZE_STRING),
            'krankenkasse' => filter_var($row[9],FILTER_SANITIZE_STRING),
            'bewertung' => filter_var($row[10],FILTER_SANITIZE_STRING),
            'wichtig' => filter_var($row[11],FILTER_SANITIZE_STRING)
        ]);

   

        
    }
}
