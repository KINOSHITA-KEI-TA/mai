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
<h2>出退勤</h2>
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
    </tr>
    @endforeach
</table>
</body>
</html>