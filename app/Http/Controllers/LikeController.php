<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TOGGLE LIKE
    |--------------------------------------------------------------------------
    */

    public function toggle($id)
    {
        $post = Post::findOrFail($id);

        $existingLike = Like::where(

            'user_id',
            Auth::id()

        )->where(

            'post_id',
            $post->id

        )->first();

        // UNLIKE
        if ($existingLike) {

            $existingLike->delete();

        } else {

            // LIKE
            Like::create([

                'user_id' => Auth::id(),

                'post_id' => $post->id
            ]);
        }

        return back();
    }
}
