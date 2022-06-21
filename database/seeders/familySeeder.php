<?php

namespace Database\Seeders;

use App\Models\family;
use Database\Factories\FamilyFactory;
use Illuminate\Database\Seeder;

class familySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        family::factory()->count(200)->create();

    }
}
