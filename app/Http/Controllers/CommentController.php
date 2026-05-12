<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | STORE COMMENT
    |--------------------------------------------------------------------------
    */

    public function store(
        Request $request
    )
        {
            $data = $request->validate([

                'post_id' => 'required',

                'content' => 'required|max:1000'
            ]);

            $data['user_id'] = Auth::id();

            Comment::create($data);

            return back();
        }
}
