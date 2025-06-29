<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(3),
            'technologies' => ['PHP', 'Laravel', 'Vue.js'],
            'project_url' => fake()->url(),
            'github_url' => fake()->url(),
            'featured_image' => null,
            'order' => fake()->numberBetween(1, 100),
        ];
    }
} 