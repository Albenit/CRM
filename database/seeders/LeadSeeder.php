<?php

namespace Database\Seeders;

use App\Models\lead;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        lead::factory()->count(250)->create();
    }
}
