<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCommentFactory extends Factory
{
    protected $model = BlogComment::class;

    public function definition(): array
    {
        return [
            'blog_id' => Blog::factory(),
            'parent_id' => null,
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'content' => $this->faker->paragraph(rand(1, 3)),
            'status' => $this->faker->randomElement(['pending', 'approved', 'spam']),
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
            'captcha_token' => $this->faker->uuid(),
            'is_admin_reply' => false,
        ];
    }

    public function approved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'approved',
        ]);
    }

    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }

    public function spam(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'spam',
        ]);
    }

    public function adminReply(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_admin_reply' => true,
            'status' => 'approved',
        ]);
    }
} 