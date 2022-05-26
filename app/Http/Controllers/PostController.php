<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $auth = Auth::user();
        return view('post/create',[ 'auth' => $auth ]);
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('post/create', ['my_user' => $user]);
    }
    public function create()
    {
        return view('post.create');
    }
    public function show(Post $post)
    {
        $posts = Post::all();
        $auth = Auth::user();
        // $user = DB::table('users')->where('id',$user_id)->first();
        // $user = DB::table('users')->find($id);
        return view('post.show', [
            // 'user_name' => $user->name, // $user名をviewへ渡す
            // 'posts' => $post, // $userの書いた記事をviewへ渡す
        ]);
    }
    
    public function store(Request $request)
    {
        $post = new Post();
        // $post->user_id = $request->user_id();
        $post->user_id = Auth::id();
        $post->site = $request->site;
        $post->contractor = $request->contractor;
        $post->today_date = $request->today_date;
        $post->Working_time = $request->Working_time;
        $post->management = $request->management;
        // $post->site = $request->site();
        // $post->today_date = $request->today_date();
        // $post->Working_time = $request->Working_time();
        $request->validate(
            [
                'site' =>  'required',
                'contractor' => 'required',
                'Working_time' => 'required',
            ]
        );
        // $post->management = $request->management();
        $post->save();
        return redirect()->route('post.create');
    }
}
