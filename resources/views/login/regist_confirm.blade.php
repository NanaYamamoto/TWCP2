<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>（ユーザー？）新規登録確認画面</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <!-- ログインフォームのCSS（Bootstrap5から借用） -->
    <link href="{{ asset('css/sign.css') }}" rel="stylesheet"> --}}
</head>

<body class="">
    
    <main class="form-signin" >
    <form method="POST" action="{{ route('regist.pre.complete') }}" enctype="multipart/form-data">
        @csrf
        <h1 class="text-center mt-5 mb-4 fw-normal">新規登録</h1>

        <div class="mx-auto border border-5 rounded" style="width:20%; background-color:#DDDDDD;">
            <div class="ml-3 mt-3">
                <div class="mb-3 text-center">
                    <h5>入力内容</h5>
                </div>
        
                <div class="container">
                    <h5 class="mt-5 font-weight-bold">名前</h5>
                    <p class="text-muted lead">{{ $data['name'] }}</p>
                </div>

                <div class="container">
                    <h5 class="mt-3 font-weight-bold">メールアドレス</h5>
                    <p class="text-muted lead">{{ $data['email'] }}</p>
                </div>
        
                <div class="container">
                    <h5 class="mt-3 font-weight-bold">パスワード</h5>
                    <p class="text-muted lead">***********</p>
                </div>
                
                <div class="container mb-4">
                    <h5 class="mt-3 font-weight-bold">プロフィール写真</h5>
                    @if ($data['read_temp_path']==="")選択されていません。
                        @else  <a href="{{ $data['read_temp_path'] }}">アップロード写真</a>
                    @endif
                </div> 
            
                <div class="ml-3 pb-5 row">
                    <a class="mr-1 btn  btn-secondary" href="/registForm" role="button">戻る</a>
                    <button class="btn btn-primary" type="submit">登録</button>
                </div>
            </div>
            
        </div>
    
    </form>
    </main>

</body>
</html>