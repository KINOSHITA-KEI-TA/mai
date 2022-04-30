@if (Session::has('message'))
    <p>{{ session('message') }}</p>
@endif

<p>名前: {{ Auth::user()->name }}</p>
<p>名前: {{ Auth::user()->id }}</p>
<div style="width:50%; margin: 0 auto; text-align:center;">

    <form action="{{ route('post.store') }}" method="POST">
    @csrf
        <div>
            現場名
            <input type="text" name="site" placeholder="現場名"/>
        </div>
        <div>
            日付
            <input type="date" class="form-control" name="today_date"/>
        </div>
        <div>
            時間入力
            <input type="time" class="form-control" name="Working_time"/>
        </div>
        <div>
        <button name="management" value="1">出勤</button>
        <button name="management" value="0">退勤</button>
        </div>
        <!-- <div>
        出勤
        <input type="radio" name="management" value="0">
        退勤
        <input type="radio" name="management" value="1">
        </div>
        <div>
        <button>登録</button>
        </div> -->
    </form>
</div>