<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Jean',
                'email' => 'fanomhjbc@gmail.com',
                'password' => Hash::make('my_password')
            ],
            [
                'name' => 'Bosco',
                'email' => 'bosco.hjf@gmail.com',
                'password' => Hash::make('my_password')
            ],
            [
                'name' => 'Heriniaina',
                'email' => 'heriniainajeanboscof@gmail.com',
                'password' => Hash::make('my_password')
            ],
        ]);
    }
}
