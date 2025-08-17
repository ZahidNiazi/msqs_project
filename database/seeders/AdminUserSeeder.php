<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'zahid UrRehman',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), // You can change 'password' to a secure one
            'level' => 'Admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
