<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ResumeItem;

class ResumeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Education
        ResumeItem::create([
            'type' => 'education',
            'title' => 'BSC. Computer Engineering',
            'organization' => 'Kwame Nkrumah University of Science and Technology',
            'location' => null,
            'start_date' => '2022-01-01',
            'end_date' => null, // Present
            'description' => 'Currently pursuing Bachelor of Science in Computer Engineering',
            'order' => 1,
        ]);

        ResumeItem::create([
            'type' => 'certification',
            'title' => 'ALX Software Engineering',
            'organization' => 'ALX Foundations',
            'location' => null,
            'start_date' => '2023-01-01',
            'end_date' => '2024-07-01',
            'description' => 'This program taught me the intricacies of Software Engineering. It has been a building block in my experience',
            'order' => 2,
        ]);

        ResumeItem::create([
            'type' => 'certification',
            'title' => 'AWS RE/START',
            'organization' => 'Amalitech',
            'location' => null,
            'start_date' => '2025-03-01',
            'end_date' => null, // Present
            'description' => 'This program is a cloud practitioner\'s course. Most companies are migrating to the cloud and as a software engineer, this levels up my skills in the cloud',
            'order' => 3,
        ]);

        // Experience
        ResumeItem::create([
            'type' => 'experience',
            'title' => 'Software Engineer Intern (Remote)',
            'organization' => 'ABCD Systems Limited',
            'location' => 'Remote',
            'start_date' => '2025-01-01',
            'end_date' => null, // Present
            'description' => 'Building client-facing software and websites using Laravel and Blade templating, following best practices in software architecture and design patterns (e.g., MVC, Service Layer).
Implemented Git for version control and collaboration, and integrated cron jobs for scheduled task automation.
Focused on clean, maintainable code and scalable solutions tailored to client requirements.',
            'order' => 1,
        ]);

        ResumeItem::create([
            'type' => 'experience',
            'title' => 'Software Engineering Intern',
            'organization' => 'Orcons Systems Limited',
            'location' => null,
            'start_date' => '2024-10-01',
            'end_date' => '2025-01-01',
            'description' => 'Developed scalable web applications using Laravel, Django, and React, implementing RESTful architecture and state management
Created high-performance APIs using FastAPI, incorporating Pydantic for data validation.
Streamlined development and deployment using Docker and Docker Compose for isolated, reproducible environments.
Collaborated in agile teams using GitHub, managing pull requests, code reviews.',
            'order' => 2,
        ]);

        ResumeItem::create([
            'type' => 'experience',
            'title' => 'Software Engineering Intern',
            'organization' => 'Orcons Systems Limited',
            'location' => null,
            'start_date' => '2023-09-01',
            'end_date' => '2024-01-01',
            'description' => 'Built scalable web applications using PHP and JavaScript, applying MVC principles and asynchronous operations with AJAX.
Optimized web server performance through caching, load balancing, and server configuration (Apache/Nginx).
Collaborated using Git and GitHub, managing branches, code reviews, and CI workflows for efficient team development.',
            'order' => 3,
        ]);
    }
}

    