<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $auth = Auth::user();

        return view('post/create',[ 'auth' => $auth ]);
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('post/create', ['my_user' => $user]);
    }
    public function create()
    {
        if(! Auth::user()) {
            return view('auth/login');
       }
        return view('post/create',['user' => Auth::id()]);
    }
    public function store(Request $request)
    {
        $post = new Post;
        // $post->user_id = $request->user_id();
        // $post->user_id = Auth::id();
        $post->site = $request->site();
        $post->today_date = $request->today_date();
        $post->Working_time = $request->Working_time();
        $post->management = $request->management();
        $post->save();
        return redirect()->route('post.create');
    }
}
