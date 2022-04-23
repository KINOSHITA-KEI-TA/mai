<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('post/create');
    }
    public function store(Request $request)
    {
        $post = new Post;
        $post->user_id = $request->user_id;
        $post->site = $request->site;
        $post->today_date = $request->today_date;
        $post->Working_time = $request->Working_time;
        $post->management = $request->management;
        $post->save();
        return redirect()->route('post.create');
    }
}
