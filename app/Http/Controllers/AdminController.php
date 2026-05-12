<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        $posts = Post::with('user')
            ->latest()
            ->get();

        $totalUsers = User::count();

        $totalPosts = Post::count();

        $totalComments = Comment::count();

        $totalLikes = Like::count();

        return view(
            'admin',
            compact(
                'users',
                'posts',
                'totalUsers',
                'totalPosts',
                'totalComments',
                'totalLikes'
            )
        );
    }
}
