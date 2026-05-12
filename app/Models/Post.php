<?php

namespace App\Models;
use App\Models\Comment;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'user_id',
        'title',
        'content',
        'image'
    ];

    // POST BELONGS TO USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
{
    return $this->hasMany(Like::class);
}
}
