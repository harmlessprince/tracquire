<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\Post\PostCommentRelatedController;
use App\Http\Controllers\Post\PostsCommentsRelationshipsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostShotRelatedController;
use App\Http\Controllers\ShotController;
use App\Http\Controllers\User\UpdateProfileImageController;
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

Route::middleware('auth:api')->prefix('v1')->group(function () {
    //Posts
    Route::apiResource('posts', PostController::class);
    Route::prefix('posts')->group(function () {
        //search through posts
        Route::get('/search', [PostController::class, 'search']);
        //get all comments under a post
        Route::get('/{post}/comments', [PostCommentRelatedController::class, 'index'])->name('posts.comments');
        //create a comment against a post
        Route::post('/{post}/comments', [PostCommentRelatedController::class, 'store'])->name('posts.comments.store');
        //get list of all comments related to a posts
        Route::get('/{post}/relationships/comments', [PostsCommentsRelationshipsController::class, 'index'])->name('posts.relationships.comments');
        //view all shot related to a particular post
        Route::get('/{post}/shots', [PostShotRelatedController::class, 'index'])->name('posts.shots');
        //view a particular shot related to a particular post
        Route::get('/{post}/shots/{shot}', [PostShotRelatedController::class, 'show'])->name('posts.shots');
        //create a shot against the post passed
        Route::post('/{post}/shots', [PostShotRelatedController::class, 'store'])->name('posts.shots.store');
    });
    //Comments
//    Route::apiResource('comments', CommentController::class);
    //users
    Route::apiResource('users', UserController::class);
    Route::prefix('users')->name('users.')->group(function () {
        //upload profile pictures for a user
        Route::post('/{user}/profile/image', [UpdateProfileImageController::class, 'update'])->name('profile.image');
        //Get all the posts of a user
        Route::get('/{user}/posts', [UserPostController::class, 'index'])->name('posts');
        //get all comments that has been made by a user
        Route::get('/{user}/comments', [UserCommentController::class, 'index'])->name('comments');
        //get all users shots
        Route::get('/{user}/shots', [UserShotController::class, 'index'])->name('shots');
        //get all transactions that has been made by a user
        Route::get('/{user}/transactions', [UserTransactionsController::class, 'index'])->name('transactions');
    });

    //chat
    Route::prefix('chats')->name('chats.')->group(function () {
        Route::post('/send/message', [MessageController::class, 'store'])->name('send.message');
        Route::get('/load/messages/{receiver}', [MessageController::class, 'show'])->name('load.messages');
    });

});

