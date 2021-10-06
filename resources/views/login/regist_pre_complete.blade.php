<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>メール送信完了画面</title>
    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    
    {{-- <!-- ログインフォームのCSS（Bootstrap5から借用） -->
    <link href="{{ asset('css/sign.css') }}" rel="stylesheet"> --}}
</head>

<body style="background-color:#EEEEEE">
        <div class="text-center">
            <div class="mt-5 fs-3 fw-bold" style="fonr-color: red;">
                <p>登録はまだ完了していません</p>
            </div>
            <div class="mx-auto border-bottom border-end border-3 rounded" style="width: 50%; height: 250px; background-color:white;">
                <div class="p-5 text-muted" style="font-size:15px; font-color:#EEEEEE;">
                    <i class="bi bi-people-fill"></i>
                    <i class="bi bi-envelope"></i>
                    <p class="">仮登録メールアドレスにメールを送信しました。</p>
                    <p class="">メール内容に記載されたURLへアクセスしていただき、</p>
                    <p class="">登録を完了してください。</p>
                </div>
            </div>
        </div>
</body>
</html>