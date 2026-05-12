<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get(
    '/profile/{id}',
    [ProfileController::class, 'show']
);

Route::middleware([
    'auth',
    'admin'
])->group(function () {

    Route::get(
        '/admin',
        [AdminController::class, 'index']
    )->name('admin.index');

});

Route::middleware('auth')->group(function () {

    Route::get(
        '/dashboard',
        [PostController::class, 'index']
    )->name('dashboard');

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

    Route::post(
        '/comments',
        [CommentController::class, 'store']
    );
    Route::post(
        '/posts/{id}/like',
        [LikeController::class, 'toggle']
    );
});

require __DIR__.'/auth.php';
