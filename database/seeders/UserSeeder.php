<?php

namespace Database\Seeders;

use App\Models\Admins;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admins::create([
            'email' => 'nina@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Nina',
        ]);
    }
}
