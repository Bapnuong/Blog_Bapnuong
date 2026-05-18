<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [PostController::class, 'index']
    )->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Posts
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/posts',
        [PostController::class, 'store']
    );

    Route::put(
        '/posts/{id}',
        [PostController::class, 'update']
    );

    Route::delete(
        '/posts/{id}',
        [PostController::class, 'destroy']
    );

    /*
    |--------------------------------------------------------------------------
    | Likes
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/posts/{id}/like',
        [LikeController::class, 'toggle']
    );

    /*
    |--------------------------------------------------------------------------
    | Comments
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/comments',
        [CommentController::class, 'store']
    );

    Route::put(
        '/comments/{id}',
        [CommentController::class, 'update']
    );

    Route::delete(
        '/comments/{id}',
        [CommentController::class, 'destroy']
    );
});
