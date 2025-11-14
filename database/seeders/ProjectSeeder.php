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
            'description' => 'AI-Powered Disease Monitoring & Prediction Platform
                                EpiScope is an AI-driven web application designed to monitor, predict, and provide insights into disease outbreaks using real-world hospital data. It leverages machine learning (XGBoost), AI-generated insights (Gemini), and interactive dashboards for healthcare decision-making.
                                The demo video (although no sound)  shows how we use the trained data to predict diseases, due to financial constraints,i stopped hosting it on the cloud, i hope to return and continue this great project',

            'technologies' => ['Django', 'React', 'PostgreSQL', 'WebSocket'],
            'project_url' => '',
            'github_url' => 'https://github.com/Grandkojo/EpiScope.git',
            'demo_url' => 'https://youtu.be/KRDk5LWtfSo',
            'featured_image' => 'episcope.png',
            'order' => 0,
        ]);
        Project::create([
            'title' => 'Polling App - Shareable, Real-Time Polls with QR Codes',
            'description' => ' A Next.js app for creating, sharing, and voting on polls. Users can authenticate, create polls with multiple options, share via unique links and QR codes, and view results in real time. Designed for event hosts, educators, product teams, and community managers who need fast audience feedback.',

            'technologies' => ['Next JS', 'Supabase', 'NextAuth'],
            'project_url' => 'https://polling.grandkojo.my',
            'github_url' => 'https://github.com/Grandkojo/polling_app.git',
            'demo_url' => '',
            'featured_image' => 'image-placeholder.jpg',
            'order' => 2,
        ]);
        Project::create([
            'title' => 'Medforecast',
            'description' => 'MedForecast is a health prediction system that uses already tested data from medical  datasets to help users find the underlying problem with them faster.For example, if you have a headache, MedForecast can help you determine whether it is a symptom of a more serious condition.MedForecast also provides other features, such as the top 10 trending diseases and a symptom checker.',
            'technologies' => ['Flask', 'PostgreSQL', 'Jupyter', 'Javascript', 'AI'],
            'project_url' => 'https://medforecast.grandkojo.my',
            'github_url' => 'https://github.com/Grandkojo/MedForecast.git',
            'demo_url' => 'https://youtu.be/z5DwAjWOvYk',
            'featured_image' => 'medfc_logo.png',
            'order' => 3,
        ]);
        Project::create([
            'title' => 'ZonifyCart',
            'description' => "A modern e-commerce platform built for local creatives and designers in Ghana. 
            We allow creatives to showcase their arts, design and decor for interested persons in Ghana or the diaspora have access to authentic creators thereby preventing fraud or fake products.
            It's in development, a demo would be uploaded.",
            'technologies' => ['Django', 'React', 'PostgreSQL', 'Tailwind CSS'],
            'project_url' => '',
            'github_url' => 'https://github.com/Grandkojo/ZonifyCart.git',
            'featured_image' => 'zonify-cart.png',
            'order' => 1,
        ]);
        Project::create([
            'title' => 'Quizzerz',
            'description' => 'Quizzerz is an interactive quiz application that comprizes of four categories of questions, i.e Geography, Science, Mathematics and English, just a fun way of testing your knowledge 😉.
            Has a dynamic set of questions for a user to answer. User can view previous quizzes to learn from them for the next round.',
            'technologies' => ['Flask', 'Python', 'PostgreSQL', 'Javascript'],
            'project_url' => '',
            'github_url' => 'https://github.com/Grandkojo/Quizzerz.git',
            'featured_image' => 'quizzerz_logo.png',
            'demo_url' => 'https://youtu.be/KjoUHCVQpy0',
            'order' => 4,
        ]);
        Project::create([
            'title' => 'HBNB Hotel Management System',
            'description' => 'A web application for booking, reviews, rating hotel residences with an admin side that manages all data.
            My first project i built in fullstack development',
            'technologies' => ['PHP', 'MySQL', 'Javascript'],
            'project_url' => '',
            'github_url' => 'https://github.com/Grandkojo/HBNB-HOTELS-MANAGEMENT-SYSTEM.git',
            'featured_image' => 'laravel_2.png',
            'order' => 5,
        ]);
    }
}
