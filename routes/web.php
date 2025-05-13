<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\ResumeItemController;
use App\Http\Controllers\AuthController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');

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
});
