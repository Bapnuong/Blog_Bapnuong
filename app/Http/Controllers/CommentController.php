<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

            return back()->with(

                'success',

                'Comment created successfully!'

            );
        }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // authorize

        if(

            Auth::id() != $comment->user_id
            &&

            auth()->user()->role != 'admin'

        ){
            abort(403);
        }

        $comment->delete();

        return back()->with(

            'success',

            'Comment deleted successfully!'

        );
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        // authorize

        if(

            Auth::id() != $comment->user_id
            &&

            auth()->user()->role != 'admin'

        ){
            abort(403);
        }

        // validate

        $request->validate([

            'content' => 'required'

        ]);

        // update

        $comment->update([

            'content' => $request->content

        ]);

        return back()->with(

            'success',

            'Comment updated successfully!'

        );
    }

}
