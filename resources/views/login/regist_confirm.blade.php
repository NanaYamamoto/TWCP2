@extends('layouts.guest')

@section('css')
<!-- ログインフォームCSS -->
<style>
.login-page {
  width: 520px;
  margin: auto;
}
.form {
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    max-width: 520px;
    padding: 30px 55px;
    text-align: center;
    border: 1px solid #00000061;
    box-shadow: 0 0 10px 0 rgb(7 7 7 / 10%), 0 5px 5px 0 rgb(0 0 0 / 4%);
}
.form h1{
    margin-bottom: 25px;
    font-size: 30px;
    font-weight: bold;
}
.form .login-form{
    width: 100%;
}

.form .box {
  text-align: left;
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 30px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}

.box .label {
    font-weight: bold;
}

.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #212529;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  margin-bottom: 15px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #4c4d4c;
}

.form .btn-back {
    background: #2125298c;
}
.form .btn-back:hover {
    background: #31353a8c;
}
</style>
@endsection

@section('content')
<body>
    <div class="login-page">
        <div class="form">
            <h1>入力内容</h1>

            <form method="POST" action="{{ route('regist.pre.complete') }}" class="login-form" enctype="multipart/form-data">
            @csrf
            <div class="box">
                <div class="label">名前</div>
                <div>{{ $data['name'] }}</div>
            </div>
            <div class="box">
                <div class="label">メールアドレス</div>
                <div>{{ $data['email'] }}</div>
            </div>
            <div class="box">
                <div class="label">パスワード</div>
                <div>***********</div>
            </div>
            <div class="box">
                <div class="label">プロフィール写真</div>
                <div>
                    @if ($data['read_temp_path']==="")選択されていません。
                    @else  <a href="{{ $data['read_temp_path'] }}">アップロード写真</a>
                    @endif
                </div>
            </div>
            <button type="submit">登録</button>
            <button class="btn-back" onclick="location.href='/registForm'">戻る</button>
            </form>
            
        </div>
    </div>
</body>

@endsection

