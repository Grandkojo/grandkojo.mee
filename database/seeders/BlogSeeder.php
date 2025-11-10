<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'Getting Started with Laravel: A Complete Guide for Beginners',
                'slug' => 'getting-started-with-laravel',
                'excerpt' => 'Learn the fundamentals of Laravel, one of the most popular PHP frameworks. This comprehensive guide covers everything from installation to building your first application.',
                'content' => $this->getLaravelContent(),
                'featured_image' => null,
                'status' => 'published',
                'views' => 1250,
                'likes' => 89,
                'minutes_read' => 12,
                'meta_tags' => ['Laravel', 'PHP', 'Web Development', 'Tutorial'],
                'meta_description' => 'Master Laravel fundamentals with this comprehensive beginner guide. Learn installation, basic concepts, and build your first application.',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Building Modern APIs with Laravel Sanctum',
                'slug' => 'building-modern-apis-with-laravel-sanctum',
                'excerpt' => 'Discover how to create secure, scalable APIs using Laravel Sanctum. Learn authentication, authorization, and best practices for API development.',
                'content' => $this->getSanctumContent(),
                'featured_image' => null,
                'status' => 'published',
                'views' => 890,
                'likes' => 67,
                'minutes_read' => 15,
                'meta_tags' => ['Laravel', 'API', 'Sanctum', 'Authentication'],
                'meta_description' => 'Create secure APIs with Laravel Sanctum. Learn authentication, authorization, and API development best practices.',
                'published_at' => Carbon::now()->subDays(12),
            ],
            [
                'title' => 'Mastering Laravel Eloquent Relationships',
                'slug' => 'mastering-laravel-eloquent-relationships',
                'excerpt' => 'Deep dive into Laravel Eloquent relationships. Learn how to work with one-to-one, one-to-many, and many-to-many relationships effectively.',
                'content' => $this->getEloquentContent(),
                'featured_image' => null,
                'status' => 'published',
                'views' => 1100,
                'likes' => 78,
                'minutes_read' => 18,
                'meta_tags' => ['Laravel', 'Eloquent', 'Database', 'ORM'],
                'meta_description' => 'Master Laravel Eloquent relationships with practical examples and best practices for database modeling.',
                'published_at' => Carbon::now()->subDays(20),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }

    private function getLaravelContent(): string
    {
        return '
        <div class="mb-8 border-l-4 border-l-emerald-500 bg-emerald-50/50 dark:bg-emerald-900/10 rounded-r-lg p-6">
            <h2 class="text-2xl font-bold mb-4 text-emerald-800 dark:text-emerald-200">
                Introduction to Laravel
            </h2>
            <p class="text-slate-700 dark:text-slate-300 leading-relaxed">
                Laravel is a powerful PHP framework that makes web development a breeze. With its elegant syntax and
                robust features, Laravel has become one of the most popular frameworks for building modern web
                applications.
            </p>
        </div>

        <div class="mb-8">
            <h3 class="text-2xl font-bold mb-6 text-slate-900 dark:text-white">Why Choose Laravel?</h3>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow border border-slate-200 dark:border-slate-700">
                    <h4 class="font-semibold text-slate-900 dark:text-white mb-2">Elegant Syntax</h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm">Laravel provides a clean, expressive syntax that makes coding enjoyable</p>
                </div>
                <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow border border-slate-200 dark:border-slate-700">
                    <h4 class="font-semibold text-slate-900 dark:text-white mb-2">Built-in Features</h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm">Authentication, authorization, caching, and more come out of the box</p>
                </div>
                <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow border border-slate-200 dark:border-slate-700">
                    <h4 class="font-semibold text-slate-900 dark:text-white mb-2">Active Community</h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm">Large community with extensive documentation and packages</p>
                </div>
                <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow border border-slate-200 dark:border-slate-700">
                    <h4 class="font-semibold text-slate-900 dark:text-white mb-2">Security</h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm">Built-in security features to protect your applications</p>
                </div>
            </div>
        </div>

        <hr class="my-8 border-slate-200 dark:border-slate-700">

        <div class="mb-8">
            <h2 class="text-3xl font-bold mb-6 text-slate-900 dark:text-white">Installation</h2>
            <p class="text-slate-700 dark:text-slate-300 mb-4">
                To get started with Laravel, you\'ll need PHP 8.1 or higher and Composer installed on your system.
            </p>
            <div class="bg-slate-900 dark:bg-slate-800 rounded-lg p-6 overflow-x-auto">
                <pre class="text-green-400 text-sm"><code>composer create-project laravel/laravel my-blog
cd my-blog
php artisan serve</code></pre>
            </div>
        </div>

        <hr class="my-8 border-slate-200 dark:border-slate-700">

        <div class="mb-8">
            <h2 class="text-3xl font-bold mb-6 text-slate-900 dark:text-white">Basic Concepts</h2>
            <div class="space-y-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4 text-slate-900 dark:text-white">Routes</h3>
                    <p class="text-slate-700 dark:text-slate-300 mb-4">
                        Routes define the URLs that your application responds to. Here\'s a simple example:
                    </p>
                    <div class="bg-slate-900 dark:bg-slate-800 rounded-lg p-6 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>Route::get(\'/welcome\', function () {
    return view(\'welcome\');
});</code></pre>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4 text-slate-900 dark:text-white">Controllers</h3>
                    <p class="text-slate-700 dark:text-slate-300 mb-4">
                        Controllers handle the logic of your application. They receive requests and return responses.
                    </p>
                    <div class="bg-slate-900 dark:bg-slate-800 rounded-lg p-6 overflow-x-auto">
                        <pre class="text-green-400 text-sm"><code>class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view(\'blog.index\', compact(\'posts\'));
    }
}</code></pre>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-8 bg-gradient-to-r from-emerald-50 to-blue-50 dark:from-emerald-900/20 dark:to-blue-900/20 rounded-lg p-8">
            <h2 class="text-3xl font-bold mb-4 text-slate-900 dark:text-white">Conclusion</h2>
            <p class="text-slate-700 dark:text-slate-300 leading-relaxed mb-4">
                Laravel provides everything you need to build modern, scalable web applications. With its comprehensive
                documentation and active community, you\'ll find plenty of resources to help you along your development
                journey.
            </p>
            <p class="text-slate-700 dark:text-slate-300 font-semibold">
                Start building amazing applications with Laravel today!
            </p>
        </div>';
    }

    private function getSanctumContent(): string
    {
        return '
        <div class="mb-8 border-l-4 border-l-blue-500 bg-blue-50/50 dark:bg-blue-900/10 rounded-r-lg p-6">
            <h2 class="text-2xl font-bold mb-4 text-blue-800 dark:text-blue-200">
                Understanding Laravel Sanctum
            </h2>
            <p class="text-slate-700 dark:text-slate-300 leading-relaxed">
                Laravel Sanctum provides a lightweight authentication system for SPAs, mobile applications, and simple token-based APIs.
                It\'s perfect for modern web applications that need flexible authentication.
            </p>
        </div>

        <div class="mb-8">
            <h3 class="text-2xl font-bold mb-6 text-slate-900 dark:text-white">Key Features</h3>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow border border-slate-200 dark:border-slate-700">
                    <h4 class="font-semibold text-slate-900 dark:text-white mb-2">SPA Authentication</h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm">Built-in support for Single Page Applications</p>
                </div>
                <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow border border-slate-200 dark:border-slate-700">
                    <h4 class="font-semibold text-slate-900 dark:text-white mb-2">API Tokens</h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm">Simple token-based authentication for APIs</p>
                </div>
                <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow border border-slate-200 dark:border-slate-700">
                    <h4 class="font-semibold text-slate-900 dark:text-white mb-2">Mobile Support</h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm">Perfect for mobile application authentication</p>
                </div>
                <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow border border-slate-200 dark:border-slate-700">
                    <h4 class="font-semibold text-slate-900 dark:text-white mb-2">Lightweight</h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm">Minimal overhead compared to Passport</p>
                </div>
            </div>
        </div>

        <hr class="my-8 border-slate-200 dark:border-slate-700">

        <div class="mb-8">
            <h2 class="text-3xl font-bold mb-6 text-slate-900 dark:text-white">Installation & Setup</h2>
            <div class="bg-slate-900 dark:bg-slate-800 rounded-lg p-6 overflow-x-auto">
                <pre class="text-green-400 text-sm"><code>composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate</code></pre>
            </div>
        </div>

        <div class="mb-8 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-lg p-8">
            <h2 class="text-3xl font-bold mb-4 text-slate-900 dark:text-white">Ready to Build</h2>
            <p class="text-slate-700 dark:text-slate-300 leading-relaxed mb-4">
                With Sanctum, you can quickly implement secure authentication for your APIs and SPAs.
                The framework handles the complexity while you focus on building great features.
            </p>
        </div>';
    }

    private function getEloquentContent(): string
    {
        return '
        <div class="mb-8 border-l-4 border-l-purple-500 bg-purple-50/50 dark:bg-purple-900/10 rounded-r-lg p-6">
            <h2 class="text-2xl font-bold mb-4 text-purple-800 dark:text-purple-200">
                Eloquent ORM Relationships
            </h2>
            <p class="text-slate-700 dark:text-slate-300 leading-relaxed">
                Laravel\'s Eloquent ORM provides an elegant way to work with your database. Relationships make it easy
                to work with related data across multiple tables.
            </p>
        </div>

        <div class="mb-8">
            <h3 class="text-2xl font-bold mb-6 text-slate-900 dark:text-white">Relationship Types</h3>
            <div class="space-y-6">
                <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700">
                    <h4 class="text-xl font-semibold mb-4 text-slate-900 dark:text-white">One-to-One</h4>
                    <p class="text-slate-700 dark:text-slate-300 mb-4">
                        A user has one profile, and a profile belongs to one user.
                    </p>
                    <div class="bg-slate-900 dark:bg-slate-800 rounded-lg p-4">
                        <pre class="text-green-400 text-sm"><code>// User Model
public function profile()
{
    return $this->hasOne(Profile::class);
}

// Profile Model
public function user()
{
    return $this->belongsTo(User::class);
}</code></pre>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 p-6 rounded-lg shadow-sm border border-slate-200 dark:border-slate-700">
                    <h4 class="text-xl font-semibold mb-4 text-slate-900 dark:text-white">One-to-Many</h4>
                    <p class="text-slate-700 dark:text-slate-300 mb-4">
                        A user has many posts, and a post belongs to one user.
                    </p>
                    <div class="bg-slate-900 dark:bg-slate-800 rounded-lg p-4">
                        <pre class="text-green-400 text-sm"><code>// User Model
public function posts()
{
    return $this->hasMany(Post::class);
}

// Post Model
public function user()
{
    return $this->belongsTo(User::class);
}</code></pre>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-8 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-lg p-8">
            <h2 class="text-3xl font-bold mb-4 text-slate-900 dark:text-white">Master Eloquent</h2>
            <p class="text-slate-700 dark:text-slate-300 leading-relaxed mb-4">
                Understanding Eloquent relationships is crucial for building efficient Laravel applications.
                They provide a clean, intuitive way to work with related data.
            </p>
        </div>';
    }
} 