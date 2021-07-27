<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'login' => 'admin',
            'password' => '12345678'
        ]);

        DB::table('users')->insert([
            'login' => 'user',
            'password' => '123456'
        ]);
    }
}
