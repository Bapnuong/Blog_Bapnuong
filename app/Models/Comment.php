<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [

        'user_id',
        'post_id',
        'content'
    ];

    // COMMENT BELONGS TO USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // COMMENT BELONGS TO POST
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
