<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function show(Post $post)  // Con esto estamos inyectando el Post completo
	{
		$replies = $post->replies()->with('autor')->paginate(2);
		
		return view('posts.detail', compact('post','replies'));
	}
}
