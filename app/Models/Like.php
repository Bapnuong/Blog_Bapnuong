<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [

        'user_id',
        'post_id'
    ];

    // LIKE BELONGS TO USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // LIKE BELONGS TO POST
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
