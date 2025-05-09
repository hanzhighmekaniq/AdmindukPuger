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
use Illuminate\Support\Facades\Auth;

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

Route::post('/email/resend-by-id', [AuthController::class, 'resendVerificationEmailById']);

route::post('/email/verify/{id}/{hash}', [AuthController::class,'verifyEmail'])->name('reverif')->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {

});
Route::get('/docs',[DocsController::class,'index'])->name('docs.index');
Route::get('/docs/download/{id}',[DocsController::class,'downloadcocs'])->name('docs.show');


Route::post('/ektp',[SubmissionController::class,'newektp'])->name('ktp.create');
Route::post('lostektp',[SubmissionController::class,'lostektp'])->name('lots_create');
Route::post('/damagedektp',[SubmissionController::class,'damagedektp'])->name('damaged_create');
Route::post('/kk', [SubmissionController::class,'newkk'])->name('kk.create');

Route::post('/kiaunder5',[SubmissionController::class,'kiaunder5'])->name('kiaunder5');
Route::post('/kia5',[SubmissionController::class,'kia5'])->name('kia5');

Route::post('/birthcertif', [SubmissionController::class,'birthcertif'])->name('birthcertif.create');

Route::post('/diecertif', [SubmissionController::class,'diecertif'])->name('diecertif.create');

Route::post('/movingletter', [SubmissionController::class,'movingletter'])->name('movingletter.create');


Route::post('register', [AuthController::class,'register'])->name('user.register');

Route::post('/login', [AuthController::class,'login'])->name('user.login');

Route::post('/logout',[AuthController::class,'logout'])->name('user.logout')->middleware('auth:sanctum');
Route::get('/submission', [SubmissionController::class,'submission'])->name('submission.get')->middleware('auth:sanctum');

Route::post('/updateprofile/{id}', [AuthController::class,'updateprofile'])->name('user.api.update')->middleware('auth:sanctum');
