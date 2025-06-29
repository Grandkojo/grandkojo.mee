<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'category' => fake()->randomElement(['Backend', 'Frontend', 'Database', 'DevOps']),
            'proficiency' => fake()->numberBetween(1, 100),
            'order' => fake()->numberBetween(1, 100),
        ];
    }
} 