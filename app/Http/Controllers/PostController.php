<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $posts = Post::with([
            'user',
            'comments.user',
            'likes'
        ])->latest()->get();

        return view(
            'dashboard',
            compact('posts')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE POST
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $data = $request->validate([

            'title' => 'required|max:255',

            'content' => 'required'
        ]);

        $data['user_id'] = Auth::id();

        Post::create($data);

        return back()->with(
            'success',
            'Post created successfully!'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE POST
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $id
    )
    {
        $post = Post::findOrFail($id);

        // security
        if (
            Auth::id() != $post->user_id
            &&
            !auth()->user()->isAdmin()
        ) {
            abort(403);
        }

        $data = $request->validate([

            'title' => 'required|max:255',

            'content' => 'required'
        ]);

        $post->update($data);

        return back()->with(
            'success',
            'Post updated!'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE POST
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // security
        if(

            auth()->id() != $post->user_id

            &&

            auth()->user()->role != 'admin'

        ){
            abort(403);
        }

        $post->delete();

        return back()->with(
            'success',
            'Post deleted!'
        );
    }
}
