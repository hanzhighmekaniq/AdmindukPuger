<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionBirthCertificateController;
use App\Http\Controllers\SubmissionDieCertificateController;
use App\Http\Controllers\SubmissionKKController;
use App\Http\Controllers\SubmissionKTPController;
use App\Http\Controllers\SubmissionTransferLetterController;
use Illuminate\Support\Facades\Route;


// ADMIN VIEW
Route::middleware('auth')->group(function () {

    // DASHBOARD ADMIN
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('submission-ktp', SubmissionKTPController::class);
    Route::resource('submission-kk', SubmissionKKController::class);
    Route::resource('submission-birth', SubmissionBirthCertificateController::class);
    Route::resource('submission-die', SubmissionDieCertificateController::class);
    Route::resource('submission-transfer', SubmissionTransferLetterController::class);

    // PROFILE ADMIN
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// USERS VIEW
Route::get('/', [LandingPageController::class, 'index'])->name('home');


require __DIR__ . '/auth.php';
