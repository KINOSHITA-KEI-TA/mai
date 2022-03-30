<h2>最初の表示</h2>
<table border="1">
    <tr>
        <th>フルーツ名</th>
    </tr>
    @foreach($fruit_list ?? '' as $fruit)
    <tr>
        <td>{{$fruit["name"]}}</td>
    </tr>
    @endforeach
    <tr>
        <th>社員</th>
    </tr>
    @foreach($name_list ?? '' as $name)
    <tr>
        <td>{{$name["name_job"]}}</td>
    </tr>
    @endforeach
</table>


<p>合計: {{$total}}</p>