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
            'location' => 'Kumasi, Ghana',
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
            'description' => 'Completed ALX Software Engineering program, an intensive full-stack development bootcamp that transformed my approach to software engineering. Gained deep understanding of software architecture, system design principles, and modern development methodologies. Learned to build end-to-end applications, implement robust testing strategies, and collaborate effectively using industry-standard tools and practices. This program has been instrumental in developing my problem-solving skills and technical expertise.',
            'order' => 2,
        ]);

        ResumeItem::create([
            'type' => 'certification',
            'title' => 'AWS RE/START',
            'organization' => 'Amalitech',
            'location' => null,
            'start_date' => '2025-03-01',
            'end_date' => '2025-07-31', // Present
            'description' => 'Completed AWS Cloud Practitioner certification, equipping me with essential cloud infrastructure knowledge. This program strengthened my understanding of AWS core services, security, and cost optimization, enabling me to build and deploy production-ready applications on cloud platforms. As companies increasingly adopt cloud-first strategies, this certification positions me to contribute effectively to cloud migration and modernization initiatives.',
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
            'description' => 'I drive scalable web applications using Laravel and Vue.js, boosting backend performance across 2+ high-impact projects. Owning 12+ APIs, I architect robust Laravel backends paired with dynamic Vue frontends to deliver seamless user experiences. Collaborating in an agile team, I initiate structured GitHub workflows—fueling efficient code reviews and accelerating feature delivery.',
            'order' => 1,
        ]);

        ResumeItem::create([
            'type' => 'experience',
            'title' => 'Software Engineering Intern',
            'organization' => 'Orcons Systems Limited',
            'location' => null,
            'start_date' => '2024-10-01',
            'end_date' => '2025-01-01',
            'description' => 'I built personal and collaborative web apps with PHP and JavaScript, applying scalable architecture and clean, modular design patterns to ensure maintainable code. I managed and optimized web servers, driving enhanced performance, uptime, and deployment reliability. Contributing to version-controlled team projects via Git and GitHub, I engaged in code reviews, branching strategies, and continuous integration practices to streamline collaboration and delivery.',
            'order' => 2,
        ]);

        ResumeItem::create([
            'type' => 'experience',
            'title' => 'Software Engineering Intern',
            'organization' => 'Orcons Systems Limited',
            'location' => null,
            'start_date' => '2023-09-01',
            'end_date' => '2024-01-01',
            'description' => 'Built personal web applications using PHP and JavaScript as well as using design practice to build scalable apps.
Learnt management of web servers for optimisation.
Incorporated the role of contribution and working together as a team using Github and Git',
            'order' => 3,
        ]);
    }
}

    