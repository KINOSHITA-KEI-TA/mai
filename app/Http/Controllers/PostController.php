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
    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->site = $request->site;
        $post->contractor = $request->contractor;
        $post->today_date = $request->today_date;
        $post->Working_time = $request->Working_time;
        $post->management = $request->management;
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
