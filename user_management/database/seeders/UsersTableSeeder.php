<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'idRole' => 1,
            'firstname' => 'Admin',
            'lastname' => 'User',
            'email' => 'mattheo.valcke@gmail.com',
            'phone' => '0781179643',
            'password' => Hash::make('!!Toto123!!'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
