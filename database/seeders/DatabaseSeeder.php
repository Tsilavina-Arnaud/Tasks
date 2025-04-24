<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Observation;
use App\Models\Task;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()->create();
        Task::factory(12)->count(2)->for($users)->create();
        Observation::factory(3)->create();
       
        User::factory()->create([
            "name" => "Tsilavina",
            "email" => "tsilavinaa186@gmail.com",
            "password" => Hash::make("taskTsilavina"),
            "role" => "admin"
        ]);
    }
}
