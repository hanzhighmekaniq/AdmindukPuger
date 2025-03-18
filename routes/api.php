<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DocsController;
use App\Http\Controllers\DocsController as ControllersDocsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;
use App\Http\Controllers\Api\SubmissionController;
use App\Models\Ektp;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return response()->json(['message' => 'Verification email resent']);
})->middleware(['auth'])->name('verification.resend');

Route::post('register', [AuthController::class,'register'])->name('user.register');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
});
Route::get('/docs',[DocsController::class,'index'])->name('docs.index');

Route::post('/ektp',[SubmissionController::class,'newektp'])->name('ktp.create');

Route::post('/kk', [SubmissionController::class,'newkk'])->name('kk.create');

Route::post('/birthcertif', [SubmissionController::class,'birthcertif'])->name('birthcertif.create');

Route::post('/diecertif', [SubmissionController::class,'diecertif'])->name('diecertif.create');

Route::post('/movingletter', [SubmissionController::class,'movingletter'])->name('movingletter.create');