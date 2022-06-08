<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class SampleController extends Controller
{
    public function index()
    {
       $posts = Post::all();
       return view('/sample',['posts' => $posts]);
        $users = User::all();
        return view('/sample',['users' => $users]);
    }

    public function delete(Request $request)
    {
        $postId = (int) $request->route('postId');
        $post = Post::where('id', $postId)->firstOrFail();
        $post->delete();
        return redirect('/sample')
            // ->route('index')
            ->with('feedback.success',"投稿を削除しました");
    }
    public function search(Request $request)
    {
        $posts = Post::where('user_id',$request->search)->get();
        return view('/sample',['posts' => $posts]);
        
    }
}