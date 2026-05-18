<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function create($request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store('posts', 'public');
        }

        return Post::create([

            'title' => $request->title,

            'content' => $request->content,

            'image' => $imagePath,

            'user_id' => Auth::id()

        ]);
    }

    public function delete(Post $post)
    {
        if ($post->image) {

            Storage::disk('public')
                ->delete($post->image);
        }

        return $post->delete();
    }
}
