<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'forum_id', 'user_id', 'title', 'description', 'slug', 'attachment',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    protected static function boot() {
        parent::boot();

        static::creating(function($post) {
            if(!App::runningInConsole()){
                $post->user_id = auth()->id();
                $post->slug = str_slug($post->title,'-');
            }
        });
    }

    public function forum(){
        return $this->belongsTo(Forum::class, 'forum_id');
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }        
}
