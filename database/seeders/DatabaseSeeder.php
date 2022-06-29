<?php

namespace Database\Seeders;

use App\Models\Pendency;
use Database\Factories\PendenciesFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//           $this->call(RoleSeeder::class);
// ////         $this->call(UserSeeder::class);
//           $this->call(AdminSeeder::class);
// ////        Pendency::factory()->count(15000)->create();
       $this->call(LeadSeeder::class);
// ////        $this->call(familySeeder::class);
//          $this->call(CampaignSeeder::class);
// $this->call(AbsenceSeeder::class);

    }
}
