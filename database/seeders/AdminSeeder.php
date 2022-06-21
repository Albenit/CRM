<?php

namespace Database\Seeders;

use App\Models\Admins;
use App\Models\EmployeePersonalData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admins = [
           1 => ['name' => 'admin','email' => 'admin@gmail.com', 'password' => Hash::make('123456'),'role'=>'admin'],
           2 => ['name' => 'backoffice','email' => 'backoffice@gmail.com', 'password' => Hash::make('123456'),'role'=>'backoffice'],
           3 => ['name' => 'salesmanager', 'email' => 'salesmanager@gmail.com', 'password' => Hash::make('123456'),'role'=>'salesmanager'],
           4 => ['name' => 'fs1','email' => 'fs1@gmail.com', 'password' => Hash::make('123456'),'role'=>'fs'],
           5 => ['name' => 'fs2','email' => 'fs2@gmail.com', 'password' => Hash::make('123456'),'role'=>'fs'],
           6 => ['name' => 'fs3','email' => 'fs3@gmail.com', 'password' => Hash::make('123456'),'role'=>'fs'],
           7 => ['name' => 'fs4','email' => 'fs4@gmail.com', 'password' => Hash::make('123456'),'role'=>'fs'],
           8 => ['name' => 'digital','email' => 'digital@gmail.com', 'password' => Hash::make('123456'),'role'=>'digital'],

       ];
       foreach($admins as $id => $admin){
           $adminss = Admins::create([
               'name' => $admin['name'],
               'email' => $admin['email'],
               'password' => $admin['password']
           ]);
           EmployeePersonalData::create(['name' => $adminss->name,'admin_id' => $adminss->id,'email'=> $adminss->email,'phone'=> '12345678']);

           $adminss->assignRole($admin['role']);
       }

    }
}

