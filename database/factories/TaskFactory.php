<?php

namespace Database\Factories;

use App\Models\Observation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => \fake()->sentence(10),
            "description" => $this->faker->sentences(2, 300),
            "user_id" => User::factory(),
            "observation_id" => Observation::factory()
        ];
    }
}
