<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\Post\PostCommentRelatedController;
use App\Http\Controllers\Post\PostsCommentsRelationshipsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\User\UserCommentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserPostController;
use App\Http\Controllers\User\UserShotController;
use App\Http\Controllers\User\UserTransactionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::prefix('auth')->group(function () {
    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgot'])->name('password.request');
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.reset');
    Route::post('/login', [AuthenticationController::class, 'login']);
    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/generate/otp', [OtpController::class, 'generateOtp'])->name('verification.generate');
    Route::post('/email/verify/otp', [OtpController::class, 'verifyOtp'])->name('verification.verify'); // Make sure to keep this as your route name

    Route::middleware('auth:api')->group(function () {
        Route::get('/user', [AuthenticationController::class, 'user']);
        Route::get('/logout', [AuthenticationController::class, 'logout']);
        Route::get('/email/resend', [OtpController::class, 'resend'])->name('verification.resend');
    });
});

Route::prefix('v1')->group(function (){
    Route::prefix('posts')->group(function () {
        //Posts
        Route::apiResource('/', PostController::class);
        Route::get('/search', [PostController::class, 'search']);
        Route::get('/{post}/comments', [PostCommentRelatedController::class, 'index'])->name('posts.comments');
        Route::get('/{post}/relationships/comments', [PostsCommentsRelationshipsController::class, 'index'])->name('posts.relationships.comments');
    });
    Route::prefix('users')->name('users.')->group(function (){
        Route::apiResource('/', UserController::class);
        Route::get('/{user}/posts', [UserPostController::class, 'index'])->name('posts');
        Route::get('/{user}/comments', [UserCommentController::class, 'index'])->name('comments');
        Route::get('/{user}/shots', [UserShotController::class, 'index'])->name('shots');
        Route::get('/{user}/transactions', [UserTransactionsController::class, 'index'])->name('transactions');
    });
});

