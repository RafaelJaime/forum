<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    protected $fillable = [
        'user_id', 'post_id', 'reply',
    ];

    protected  $appends = ['forum'];

    public function post(){
    	return $this->belongsTo(Post::class, 'post_id');
    }

    public function autor(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function getForumAttribute() {
    	return $this->post->forum;
    }
}
