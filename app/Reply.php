<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Reply extends Model
{
    protected $table = 'replies';

    protected $fillable = [
        'user_id', 'post_id', 'reply',
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function($reply) {
            if(!App::runningInConsole()){
                $reply->user_id = auth()->id();
            }
        });
    }

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
