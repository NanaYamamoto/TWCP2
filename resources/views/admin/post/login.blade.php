<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <!-- Styles -->

    <link href="{{ asset('css/login.scss') }}" rel="stylesheet">
</head>

<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1><span>暮らしのアプリ</span> ログイン</h1>
                    <div class="form-group row">
                        <input placeholder="メールアドレス" type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <input placeholder="パスワード" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button class="btn">ログイン</button>
                    @if (Route::has('password.request'))
                    <button class="reset-btn" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れた場合') }}
                    </button>
                    @endif
                </form>
            
            </div>
        </div>
    </div>

    <footer>
        <h5><a target="_blank" href="{{route('post.home')}}">ホームに戻る</a></h5><!--href="http://lifes.gd"-->
    </footer>

</body>