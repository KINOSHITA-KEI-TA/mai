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
        $search = $request->input('search');
        $year = $request->input('year');
        $month = $request->input('month');
        // $query = Post::query();
        if(!empty($search)) {
        // $query = Post::where('user_id',$request->search)->get()
        $posts = Post::where('user_id',$request->search)
        ->whereYear('today_date',$request->year)
        ->whereMonth('today_date',$request->month)->get();
        }
        // if(!empty($year)) {
        // // $posts = Post::whereYear('today_date','yyyy', 'LIKE', "%{$year}%")->get();
        // $query = Post::whereYear('today_date',$request->year)->get();
        // // $query->whereYear('today','yyyy', 'LIKE', "%{$year}%");
        // // $posts = Post::where('today',$request->year)->get();
        // }
        // if(!empty($month)) {
        // // $posts = Post::whereMonth('today_date','mm', 'LIKE', "%{$month}%")->get();
        // $query = Post::whereMonth('today_date',$request->month)->get();
        // // $query->whereMonth('today','mm', 'LIKE', "%{$month}%");
        // }

        // $posts = $query->get();
        // DB::table(テーブル名)->whereYear(カラム名, 'yyyy')->get();
        // User::whereDate('created_at', '2019-05-01')->get();
        // $posts = POST::table('post')
        //         ->whereMonth('today_date', '6')
        //         ->get();
        return view('/sample',['posts' => $posts]);
        
    }
}