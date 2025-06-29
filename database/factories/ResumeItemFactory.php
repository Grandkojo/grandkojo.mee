<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResumeItem>
 */
class ResumeItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['experience', 'education', 'certification']),
            'title' => fake()->jobTitle(),
            'organization' => fake()->company(),
            'location' => fake()->city() . ', ' . fake()->stateAbbr(),
            'start_date' => fake()->dateTimeBetween('-5 years', '-1 year'),
            'end_date' => fake()->optional()->dateTimeBetween('-1 year', 'now'),
            'description' => fake()->paragraph(2),
            'order' => fake()->numberBetween(1, 100),
        ];
    }
} 