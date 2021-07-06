<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['name' => 'AdminUser','created_at' => now(),'updated_at' => now()], // record 1
				['name' => 'NormalUser','created_at' => now(),'updated_at' => now()], // record 2
				];
		DB::table('roles')->insert($data);
    }
}
