<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'EpiScope',
            'description' => 'An epidemiological data visualization tool for analyzing and monitoring epidemiological data. Built with Django and React. In progress.',
            'technologies' => ['Django', 'React', 'PostgreSQL', 'WebSocket'],
            'project_url' => '',
            'github_url' => 'https://github.com/Grandkojo/EpiScope.git',
            'featured_image' => 'project-imgs/episcope.png',
            'order' => 0,
        ]);
        Project::create([
            'title' => 'Medforecast',
            'description' => 'A web application that predicts health conditions per the user input. With the most pressing symptom of the user, our machine learning model asks questions that are related to the symptom for a good diagnosis.',
            'technologies' => ['Flask', 'PostgreSQL', 'Jupyter', 'Javascript', 'AI'],
            'project_url' => 'https://medforecast.grandkojo.my',
            'github_url' => 'https://github.com/Grandkojo/MedForecast.git',
            'featured_image' => 'project-imgs/medfc_logo.png',
            'order' => 1,
        ]);
        Project::create([
            'title' => 'ZonifyCart',
            'description' => 'A modern ecommerce platform built with Django and React. Stay tuned!',
            'technologies' => ['Django', 'React', 'PostgreSQL', 'Tailwind CSS'],
            'project_url' => '',
            'github_url' => 'https://github.com/Grandkojo/ZonifyCart.git',
            'featured_image' => 'project-imgs/zonify-cart.png',
            'order' => 2,
        ]);
        Project::create([
            'title' => 'Quizzerz',
            'description' => 'An application that has a dynamic set of questions for a user to answer. User can view previous quizzes to learn from them for the next round.',
            'technologies' => ['Flask', 'Python', 'PostgreSQL', 'Javascript'],
            'project_url' => '',
            'github_url' => 'https://github.com/Grandkojo/Quizzerz.git',
            'featured_image' => 'project-imgs/quizzerz_logo.png',
            'order' => 3,
        ]);
        Project::create([
            'title' => 'HBNB Hotel Management System',
            'description' => 'A web application for booking, reviews, rating hotel residences with an admin side that manages all data.',
            'technologies' => ['PHP', 'MySQL', 'Javascript'],
            'project_url' => '',
            'github_url' => 'https://github.com/Grandkojo/HBNB-HOTELS-MANAGEMENT-SYSTEM.git',
            'featured_image' => 'project-imgs/laravel_2.png',
            'order' => 4,
        ]);
    }
}
