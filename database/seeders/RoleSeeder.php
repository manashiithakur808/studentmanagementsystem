<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'description'=>'System Administrator',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Teacher',
                'description' => 'College Teacher',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Student',
                'description' => 'College Student',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
