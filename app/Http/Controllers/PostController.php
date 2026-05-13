<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->search;

        $posts = Post::with([

            'user',
            'comments.user',
            'likes'

        ])
        ->when($search, function($query) use ($search){

            $query->where(function($q) use ($search){

                $q->where(

                    'title',
                    'LIKE',
                    "%{$search}%"

                )
                ->orWhere(

                    'content',
                    'LIKE',
                    "%{$search}%"

                );

            });

        })
        ->latest()
        ->paginate(5)
        ->withQueryString();

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
        $request->validate([

            'title' => 'required|max:255',

            'content' => 'required',

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $imagePath = null;

        // upload image

        if($request->hasFile('image'))
        {
            $imagePath = $request
                ->file('image')
                ->store('posts', 'public');
        }

        Post::create([

            'title' => $request->title,

            'content' => $request->content,

            'image' => $imagePath,

            'user_id' => Auth::id()

        ]);

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

        $request->validate([

            'title' => 'required|max:255',

            'content' => 'required',

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $imagePath = $post->image;

        // update image

        if($request->hasFile('image'))
        {
            // delete old image

            if($post->image)
            {
                Storage::disk('public')
                    ->delete($post->image);
            }

            // upload new image

            $imagePath = $request
                ->file('image')
                ->store('posts', 'public');
        }

        $post->update([

            'title' => $request->title,

            'content' => $request->content,

            'image' => $imagePath

        ]);

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

        if(
            auth()->id() != $post->user_id
            &&
            auth()->user()->role != 'admin'
        ){
            abort(403);
        }

        // delete image

        if($post->image)
        {
            Storage::disk('public')
                ->delete($post->image);
        }

        $post->delete();

        return back()->with(
            'success',
            'Post deleted!'
        );
    }
}
