<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>（ユーザー？）ログインフォーム</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- ログインフォームのCSS（Bootstrap5から借用） -->
    <link href="{{ asset('css/sign.css') }}" rel="stylesheet">
</head>

<body>
    
    <main class="form-signin">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">ログイン</h1>

        <!--バリデーションエラーの表示-->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="inputEmail" class="visually-hidden">メールアドレス</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" autofocus>
        <label for="inputPassword" class="visually-hidden">パスワード</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password">
                               
        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">ログイン</button>
    </form>
    </main>

</body>
</html>