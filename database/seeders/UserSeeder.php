<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'Admin',
            'email' => 'admin@fileapp.com',
            'password' => Hash::make('12345678'),
			'created_at' => now(),
			'updated_at' => now(),
        ]);
		DB::table('users_roles')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }
}
