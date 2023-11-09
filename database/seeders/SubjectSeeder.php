<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            ['name' => 'Math'],
            ['name' => 'Science'],
            ['name' => 'Geography'],
            ['name' => 'Physics'],
            ['name' => 'English'],
            ['name' => 'Arts']
        ];

        DB::table('subjects')->insert($subjects);
    }
}
