<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SampleController extends Controller
{
    public function index()
    {
       $posts = Post::all();
       return view('/Sample',['posts' => $posts]);
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
}
