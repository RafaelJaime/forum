<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;

class ForumController extends Controller
{
    public function index()
    {
        // $forums = Forum::all();
        $forums = Forum::with(['replies','posts'])->paginate(5);
        return view('forums.index',compact('forums'));
    }       

    public function show(Forum $forum)
    {
        // dd($forum);
        // SELECT * FROM posts
        // WHERE forum_id = $forum->id
        $posts = $forum->posts()->with(['owner'])->paginate(2);
        // dd($posts);
        return view('forums.detail',compact('forum','posts'));
    }
}
