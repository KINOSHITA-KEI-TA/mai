@if (Session::has('message'))
    <p>{{ session('message') }}</p>
@endif
<p>名前: {{ Auth::user()->name }}</p>
<p>社員番号: {{ Auth::user()->id }}</p>
<p><a href="/sample">出勤一覧</a></p>
<p><a href="/dashboard">ダッシュボード</a></p>

<div style="width:50%; margin: 0 auto; text-align:center;">

    <form action="{{ route('post.store') }}" method="POST">
    @csrf
        <div>
            <label>現場名</label>
            <input type="text" name="site" placeholder="現場名"/>
        </div>
        <div>
            <label>日付</label>
            <input type="date" class="form-control" name="today_date" id="today" value=""/>
        </div>
        <div>
            <label>時間入力</label>
            <input type="time" class="form-control" name="Working_time" id="today_time" value="00:00"/>
        </div>
        <span id="today_time"></span>
        <div>
            <label>元請名</label>
            <input type="text" class="form-control" name="contractor" list="contractor-list" placeholder="テキスト入力もしくは選択" autocomplete="off"/>
            <datalist id="contractor-list">
                <option value="A建築派遣">
                <option value="B建築派遣">
                <option value="C建築派遣">
            </datalist>
        </div>
        <div>
        <button name="management" value="1">出勤</button>
        <button name="management" value="0">退勤</button>
        <button name="management" value="2">その他</button>
        </div>
    </form>
</div>
@foreach ($errors->all() as $error)
    {{ $error }}
@endforeach
<!-- {{ $errors->first() }} -->
<script src="{{ mix('js/create.js') }}"></script>

