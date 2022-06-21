<?php

namespace Database\Seeders;

use App\Models\Trainings;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainings::factory()->count(30)->create();
    }
}
