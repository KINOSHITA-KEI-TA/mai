<div style="width:50%; margin: 0 auto; text-align:center;">
    <form action="{{ route('post.store') }}" method="POST">
        <div>
            現場名
            <input name="site" placeholder="現場名"/>
        </div>
        <div>
            日付
            <input type="date" class="form-control" name="today_date"/>
        </div>
        <div>
            時間入力
            <input type="time" class="form-control" name="Working_time">
        </div>
        <div>
        <button>出勤</button>
        <button>退勤</button>
        </div>
    </form>
</div>