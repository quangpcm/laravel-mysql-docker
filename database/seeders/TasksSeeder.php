<?php

namespace Database\Seeders;

use Faker\Core\Number;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Type\Integer;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userID = DB::table('users')->pluck('id');

        for ($x = 0; $x <= 20; $x+=1) {
            DB::table('tasks')->insert([
                'title' => Str::random(10),
                'description' => Str::random(30),
                'type' => 4,
                'status' => 5,
                'estimate' => 6.9,
                'actual' => 5.8,
                'user_id' => rand(1, 3),
            ]);
        }
    }
}
