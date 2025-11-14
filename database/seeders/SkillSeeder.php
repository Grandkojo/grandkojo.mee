<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create([
            'name' => 'Laravel',
            'category' => 'Backend',
            'proficiency' => 85,
            'order' => 0,
        ]);

        Skill::create([
            'name' => 'AWS',
            'category' => 'DevOps',
            'proficiency' => 75,
            'order' => 0,
        ]);

        Skill::create([
            'name' => 'React',
            'category' => 'Frontend',
            'proficiency' => 60,
            'order' => 1,
        ]);

        Skill::create([
            'name' => 'AI',
            'category' => 'Tools',
            'proficiency' => 50,
            'order' => 2,
        ]);

        Skill::create([
            'name' => 'Django',
            'category' => 'Backend',
            'proficiency' => 60,
            'order' => 3,
        ]);

        Skill::create([
            'name' => 'HTML & CSS',
            'category' => 'Frontend',
            'proficiency' => 100,
            'order' => 4,
        ]);

        Skill::create([
            'name' => 'Javascript',
            'category' => 'Frontend',
            'proficiency' => 80,
            'order' => 5,
        ]);

        Skill::create([
            'name' => 'Python',
            'category' => 'Database',
            'proficiency' => 80,
            'order' => 6,
        ]);

        Skill::create([
            'name' => 'Git',
            'category' => 'Tools',
            'proficiency' => 80,
            'order' => 7,
        ]);

        Skill::create([
            'name' => 'SQL',
            'category' => 'Database',
            'proficiency' => 75,
            'order' => 8,
        ]);

        Skill::create([
            'name' => 'Docker',
            'category' => 'Tools',
            'proficiency' => 50,
            'order' => 9,
        ]);
    }
}

