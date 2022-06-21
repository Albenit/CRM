<?php

namespace Database\Seeders;
use App\Models\campaigns;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    public function run()
    {
        $campaigns = [
            1 => 'instagram',
            2 => 'facebook',
            3 => 'sanascout'
        ];


        foreach($campaigns as $camp){
            campaigns::create([
                'name' => $camp
            ]);
        }
    }
}
