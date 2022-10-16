<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'username' => 'superadmin',
            'name' => 'Super Admin',
            'role' => 1, // 1 = Super Admin
            'password' => Hash::make('password'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Admin ',
            'role' => 2, // 2 = Admin Only
            'password' => Hash::make('password'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
