<?php

use App\Http\Controllers\Auth\VerifyEmailController;
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
Route::get('userdetail/{id}', [UserController::class, 'detail'])->name('user.detail');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/verif-berhasil', [DashboardController::class, 'success'])->name('success');

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])
    ->middleware(['signed'])
    ->name('verification.verify');

// USERS VIEW
Route::get('/', [LandingPageController::class, 'index'])->name('home');


require __DIR__ . '/auth.php';
