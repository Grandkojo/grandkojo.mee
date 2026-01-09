<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\ResumeItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/services', [PortfolioController::class, 'services'])->name('services');
Route::get('/projects/{project}', [PortfolioController::class, 'showProject'])->name('project.show');

// Blog Routes
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
    Route::post('/{slug}/like', [BlogController::class, 'like'])->name('like');
    Route::post('/{slug}/comment', [BlogController::class, 'comment'])->name('comment');
    Route::post('/identify', [BlogController::class, 'identify'])->name('identify');
});

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('dashboard/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Projects
    Route::resource('projects', ProjectController::class)->names([
        'create' => 'projects.create',
        'index' => 'projects.index',
        'store' => 'projects.store',
        'edit' => 'projects.edit',
        'update' => 'projects.update',
        'destroy' => 'projects.destroy',
    ]);
    
    // Skills
    Route::resource('skills', SkillController::class)->names([
        'create' => 'skills.create',
        'index' => 'skills.index',
        'store' => 'skills.store',
        'edit' => 'skills.edit',
        'update' => 'skills.update',
        'destroy' => 'skills.destroy',
    ]);

    // Resume
    Route::resource('resume', ResumeItemController::class)->parameters([
        'resume' => 'resumeItem'
    ])->names([
        'create' => 'resume.create',
        'index' => 'resume.index',
        'store' => 'resume.store',
        'edit' => 'resume.edit',
        'update' => 'resume.update',
        'destroy' => 'resume.destroy',
    ]);

    // Blogs - Place specific routes BEFORE the resource route
    Route::get('blogs/comments', [AdminBlogController::class, 'comments'])->name('blogs.comments');
    Route::post('blogs/preview', [AdminBlogController::class, 'preview'])->name('blogs.preview');
    
    Route::resource('blogs', AdminBlogController::class)->names([
        'create' => 'blogs.create',
        'index' => 'blogs.index',
        'store' => 'blogs.store',
        'edit' => 'blogs.edit',
        'update' => 'blogs.update',
        'destroy' => 'blogs.destroy',
    ]);
    
    // Comment management routes
    Route::post('comments/{comment}/approve', [AdminBlogController::class, 'approveComment'])->name('comments.approve');
    Route::post('comments/{comment}/spam', [AdminBlogController::class, 'spamComment'])->name('comments.spam');
    Route::delete('comments/{comment}', [AdminBlogController::class, 'deleteComment'])->name('comments.destroy');
    Route::post('comments/{comment}/reply', [AdminBlogController::class, 'reply'])->name('comments.reply');
}); 

Route::post('/send-email', [PortfolioController::class, 'sendEmail'])->name('send.email');
