<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <link href="{{ asset('css/newpost.css') }}" rel="stylesheet">
    <link href="{{ asset('css/team.css') }}" rel="stylesheet">
    <title>teamM.jp</title>

    <meta name="description" content="ユーザー専用記事作成ページ" />
</head>

<body>
    <!--ページトップ(黒帯)-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3" width:1400px;>
        <a class="navbar-brand" href="/">teamM.jp</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('post.profile') }}">プロフィール</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('post.regist') }}">記事作成</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#searchpost">記事検索</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#archive">アーカイブ</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('newpost')
    


    <!-- フッター(最下部黒帯) -->
    <footer class="text-center bg-dark text-white">
        <p class="py-3">teamM.jp</p>
    </footer>

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
    <!--IE11用-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
    <!--JSを読み込み-->
    <script src="{{ asset('js/newpost.js') }}"></script>
</body>

</html>