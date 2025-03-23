<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SubmissionAdminController;


Route::middleware('auth')->group(function () {

    // DASHBOARD ADMIN
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('submission', SubmissionAdminController::class);
    Route::resource('document', DocumentController::class);
    Route::resource('user', UserController::class);


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// USERS VIEW
Route::get('/', [LandingPageController::class, 'index'])->name('home');


require __DIR__ . '/auth.php';
