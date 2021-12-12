@extends('layouts.guest')

@section('css')
<!-- ログインフォームCSS -->
<style>
    .login-page {
        width: 350px;
        margin: auto;
    }

    .login-page h1 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 30px;
        font-weight: bold;
        color: white;
    }

    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 350px;
        padding: 40px 55px;
        text-align: center;
        border: 1px solid #00000003;
        box-shadow: 0 0 10px 0 rgb(7 7 7 / 10%), 0 5px 5px 0 rgb(0 0 0 / 4%);
    }

    .form .login-form {
        width: 100%;
    }

    .form input {
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

    .form input:hover,
    .form input:focus {
        background: #ecebeb;
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
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
        background: #4c4d4c;
    }

    .pass-link {
        border: 1px solid white;
        border-radius: 5px;
        margin-top: 10px;
        padding: 5px;
        text-align: center;
    }

    .pass-link .forgot-pass {
        color: white;
        text-decoration: none;
        font-size: 13px;
    }

    .pass-link .forgot-pass:hover {
        color: rgba(255, 255, 255, 0.747);
        text-decoration: none;
    }

    .regist-link a {
        font-size: 13px;
        color: white;
        text-decoration: none;
        margin-top: 5px;
        text-align: center;
        display: block;
    }

    .regist-link a:hover {
        color: rgb(255, 255, 255, 0.747);
    }
</style>
@endsection

@section('content')

<body>
    <div class="login-page">
        <h1 style="color: black;">管理者ログイン</h1>

        <!--パスワード変更完了メッセージの表示-->
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>

        <div class="form">
            <!--入力フォームバリデーションエラーの表示-->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!--ログインエラーの表示-->
            @if (session('login_error'))
            <div class="alert alert-danger">
                {{ session('login_error')}}
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}" class="login-form">
                @csrf
                <input name="email" type="text" placeholder="メールアドレス" autofocus />
                <input name="password" type="password" placeholder="パスワード" />
                <button type="submit">login</button>
            </form>
        </div>
        
    </div>
</body>

@endsection