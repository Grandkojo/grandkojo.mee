<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Removed factory call to avoid Faker dependency in production
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminUserSeeder::class,
        ]);
        $this->call([
            ResumeItemSeeder::class,
        ]);
        $this->call([
            SkillSeeder::class,
        ]);
        $this->call([
            ProjectSeeder::class,
        ]);
    }
}

