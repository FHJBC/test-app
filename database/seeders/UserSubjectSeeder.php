<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userSubjects = [
            ['user_id' => 1, 'subject_id' => 1],
            ['user_id' => 1, 'subject_id' => 2],
            ['user_id' => 2, 'subject_id' => 3],
            ['user_id' => 2, 'subject_id' => 4],
            ['user_id' => 2, 'subject_id' => 5],
            ['user_id' => 3, 'subject_id' => 2],
            ['user_id' => 3, 'subject_id' => 4],
            ['user_id' => 3, 'subject_id' => 6],
        ];

        DB::table('user_subjects')->insert($userSubjects);
    }
}
