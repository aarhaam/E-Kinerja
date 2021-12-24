<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
           'employee_id' => 'ad01',
           'name' => 'admin',
           'email' => 'admin@gmail.com',
           'password' => Hash::make('admin123'),
           'occupation' => 'admin',
           'status' => 'admin'
        ]);
    }
}
