<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = [
            ['login'=> 'admin', 'password' => 'admin'],
        ];

        DB::table('admins')->insert($admin);

    }
}
