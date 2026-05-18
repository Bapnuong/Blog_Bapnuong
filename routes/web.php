<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/posts/{post}', function (Post $post) {

    return view(
        'Posts.show',
        compact('post')
    );
});

/*
|--------------------------------------------------------------------------
| Route Groups
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
require __DIR__.'/post.php';
require __DIR__.'/admin.php';
require __DIR__.'/profile.php';
