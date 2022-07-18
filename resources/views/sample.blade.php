<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイ・ワーキング</title>
</head>
<body>
<div>
@if (session('feedback.success'))
    <p style="color: green">{{ session('feedback.success')}}</p>
@endif
<h2>出退勤</h2>
<p><a href="/post">出退勤画面</a></p>
<p><a href="/sample">一覧表示</a></p>
</div>
<div>
  <form action="{{route('sample.search') }}", method="POST">
    @csrf
        <select id="name-list" name="search" value="">
            <option value="1">木下啓太</option>
            <option value="2">田中一郎</option>
        </select>
        <select id="year-list" name="year" value="">
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
        </select>
        <select id="name-list" name="month" value="">
            <option value="01">1月</option>
            <option value="02">2月</option>
            <option value="03">3月</option>
            <option value="04">4月</option>
            <option value="05">5月</option>
            <option value="06">6月</option>
            <option value="07">7月</option>
            <option value="08">8月</option>
            <option value="09">9月</option>
            <option value="10">10月</option>
            <option value="11">11月</option>
            <option value="12">12月</option>
        </select>
    <input type="submit" value="検索">
  </form>
</div>
<table border="1" style="border-collapse: collapse">
    <tr>
        <th>名前</th>
        <th>元請会社</th>
        <th>現場名</th>
        <th>出勤日</th>
        <th>時刻</th>
        <th>出退</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{$post->user->name}}</td>
        <td>{{$post->contractor}}</td>
        <td>{{$post->site}}</td>
        <td>{{$post->today_date}}</td>
        <td>{{substr($post->Working_time, 0,5)}}</td>
        <!-- <td>{{$post->management}}</td> -->
    @if($post['management'] === 1)
        <td>出勤</td>
    @elseif($post['management'] === 0)
        <td>退勤</td>
    @else
        <td>移動日</td>
    @endif
    @if (Auth::user()->id == $post->user_id)
    <form action="{{ route('sample.delete',['postId'=> $post->id])
    }}" method="post">
        @method('DELETE')
        @csrf
        <td><button type="submit">削除</button></td>
    </form>
    @else
        <td></td>
    @endif
    </tr>
    
    @endforeach
</table>
</body>
</html>