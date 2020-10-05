<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forums';

    protected $fillable = [
        'name', 'description'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function replies(){
        return $this->hasManyThrough(Reply::class, Post::class);
    }
}
