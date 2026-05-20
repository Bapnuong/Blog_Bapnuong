<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Main Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $posts = Post::with('user')
        ->withCount([
            'likes',
            'comments'
        ])
        ->latest()
        ->paginate(10);

    return view(
        'welcome',
        compact('posts')
    );
});

Route::get(

    '/posts/{id}',

    [PostController::class, 'show']

);
/*
|--------------------------------------------------------------------------
| Route Groups
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
require __DIR__.'/post.php';
require __DIR__.'/admin.php';
require __DIR__.'/profile.php';
