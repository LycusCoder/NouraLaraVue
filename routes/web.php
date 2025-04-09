<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\DashboardController;

// Halaman utama
Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('welcome');

Route::get('/test', function () {
    return Inertia::render('Test', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Halaman "Getting Started"
Route::get('/started', function () {
    return Inertia::render('Started');
})->name('started');

// Halaman "Getting Started"
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', function () {
        return Inertia::render('Profile');
    })->name('profile');

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    })->name('settings');

    Route::get('/notifications', function () {
        return Inertia::render('Notifications');
    })->name('notifications');
});


require __DIR__.'/auth.php';
