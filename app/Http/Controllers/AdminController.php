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

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        // không cho xoá chính mình 😎

        if(auth()->id() == $user->id)
        {
            return back()->with(
                'error',
                'You cannot delete yourself!'
            );
        }

        $user->delete();

        return back()->with(
            'success',
            'User deleted successfully!'
        );
    }
}
