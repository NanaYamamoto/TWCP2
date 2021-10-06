<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>（ユーザー？）新規登録フォーム</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- ログインフォームのCSS（Bootstrap5から借用） -->
    <link href="{{ asset('css/sign.css') }}" rel="stylesheet">
</head>

<body class="text-center">
    
    <main class="form-signin">
    <form method="POST" action="{{ route('regist.confirm') }}" enctype="multipart/form-data">
        @csrf
        <h1 class="h1 mb-5 fw-normal">新規登録</h1>

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

        <div class="form-floating mb-3 row">
            <input name="name" type="name" class="form-control" id="floatingInput" placeholder="名前">
            {{-- <label for="floatingInput">Email address</label> --}}
        </div>
        <div class="form-floating mb-3 row">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="メールアドレス">
            {{-- <label for="floatingInput">Email address</label> --}}
        </div>
        <div class="form-floating row">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="パスワード">
            {{-- <label for="floatingPassword">Password</label> --}}
        </div>
        <div class="mb-1 row">
            <label for="inputIcon" class="visually-hidden">アイコン写真</label>
            <input name="icon" type="file" id="inputIcon" >
        </div> 
    
        <div class="mt-3 row">
            <button class="w-100 btn btn-lg btn-primary" type="submit">確認画面</button>
        </div>
        <div class="m-3">
            <a href="{{ route('showLogin')}}">ログイン</a>
        </div>

    </form>
    </main>

</body>
</html>