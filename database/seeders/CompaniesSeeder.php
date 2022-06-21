<?php

namespace Database\Seeders;

use App\Models\Companies;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = ['Helsana','Sympany','GM','Swica'];
        $grund = ['Grund','Zusat'];
        foreach ($grund as $gr){
            foreach ($companies as $comp){
                Companies::create(['company_name' => $comp,'provision_percent' => random_int(35,80),'field' => $gr]);
            }
        }
    }
}
