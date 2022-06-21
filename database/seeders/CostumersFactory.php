<?php

namespace Database\Seeders;

use App\Models\Costumer;
use Illuminate\Database\Seeder;

class CostumersFactory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Costumer::factory()->count(8)->create();
    }
}
