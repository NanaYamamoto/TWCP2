@extends('layouts.guest')

@section('css')
<style>
.box {
  width: 520px;
  margin: auto;
}
.box2 {
    width: 100%;
    position: relative;
    z-index: 1;
    background:#ccc9c970;
    max-width: 520px;
    padding: 30px 55px;
    text-align: center;
    border: 1px solid #00000061;
    box-shadow: 0 0 10px 0 rgb(7 7 7 / 10%), 0 5px 5px 0 rgb(0 0 0 / 4%);
}
.box2 h1{
    margin-bottom: 20px;
    font-size: 15px;
    font-weight: bold;
    color: gray;
}

.box2 .logo{
    margin: 25px 0;
}
.box2 .logo svg {
    color: rgb(80 197 45 / 76%);
}

.box2 p{
    font-size: 12px;
    color: gray;
}

.box2 a {
    color:rgb(173 173 173);
}

</style>
@endsection

@section('content')
<body class="box">
    <div class="box2">   
        <div>
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="110" height="50" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                </svg>
            </div>
            <h1>登録が完了しました。</h1>
            <a href="{{ Route('member.mypage') }}">マイページへ</a>
        </div>
    </div>
</body>
</html>
@endsection