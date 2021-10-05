<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <link href="{{ asset('css/team.css') }}" rel="stylesheet">
    <link href="{{ asset('css/post.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>
    <!--ローディング画面-->
    
    <div id="container">

        <!--タイトル壁紙-->
        <div class="wallpaper">

            <!--タイトル文字-->
            <div class="letter">
                <p>teamM.jp</p>
            </div>

            <!--スクロール-->
            <div class="scrolldown1" style="z-index:2"><span>Scroll</span></div>

            <img src="/images/画像/table.jpeg" alt="">

            <!--ページトップ-->
            <nav class="navbar navbar-expand navbar-dark tempting-azure-gradient" style="z-index: 100;">

                <div class="container d-flex justify-content-center px-4">
                    <a class="navbar-brand mr-auto" href="/" style="font-size:1.5rem;"><i class="fas fa-sun mr-1"></i>暮らしのまとめ</a>



                    <!-- <form method="GET" action="{{ route('operate.user') }}" class="search-form form-inline w-25 d-none d-md-flex">
                        <span></span>
                        <input class="form-control w-100" name="free_word" type="search" placeholder="投稿を検索" value="{{ $freeWord ?? old('free_word') }}">
                    </form> -->



                    <!-- 検索フォームを表示しない -->


                    <ul class="navbar-nav ml-auto d-none d-md-flex align-items-center">

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.register') }}"><i class="fas fa-user-plus mr-1"></i>ユーザー登録</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link mr-2" href="{{ route('post.login') }}"><i class="fas fa-sign-in-alt mr-1"></i>ログイン</a>
                        </li>


                        @endguest

                        @auth()
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.regist') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
                        </li>


                        <form id="quick-post" method="POST" action="">
                            @csrf

                        </form>

                        <!-- Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <img class="user-mini-icon  rounded-circle" src="{{ Auth::user()->icon_url }}"> -->
                                @isset($authgroup)
                                    {{ Auth::guard($authgroup)->user()->name }}さん
                                    @else
                                    {{ Auth::user()->name }}さん
                                @endisset
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <button form="mypage-button" class="dropdown-item" type="submit">
                                    マイページ
                                </button>

                                <div class="dropdown-divider"></div>
                                <button form="logout-button" class="dropdown-item" type="submit">
                                    ログアウト
                                </button>
                            </div>
                        </li>
                        <form id="mypage-button" method="POST" action="{{ route('post.profile') }}">
                            @csrf
                        </form>
                        <form id="logout-button" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                        <!-- Dropdown -->
                        @endauth

                    </ul>
                </div>

            </nav>
        </div>

        <!--ラインナップ-->
        <div class="container-fluid">
            <div class="row">
                <!-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="card-header text-center mt-2"><i class="fas fa-tags mr-2"></i>タグ</div>
                    <div class="card-body py-3 mx-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <span data-feather="home"></span>
                                    ダッシュボード
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="file"></span>
                                    注文
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="shopping-cart"></span>
                                    商品
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="users"></span>
                                    お客様
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="bar-chart-2"></span>
                                    レポート
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="layers"></span>
                                    インテグレーション
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav> -->

                <!-- <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> -->
                <main class="col-md-10 col-lg-10 offset-1 px-md-4">
                    @yield('contents')
                </main>
            </div>
            <footer id="globalfooter">
        <div class="lib-wrap">
            <div class="box-lid-menu">
                <div class="openbtn"><span></span><span></span><span></span></div>
                <nav id="g-nav" class="">
                    <div id="category-list"><!--ナビの数が増えた場合縦スクロールするためのdiv-->
                        <ul>
                            <li><a href="#">インテリア</a></li> 
                            <li><a href="#">キッチン</a></li>
                            <li><a href="#">スポーツ</a></li> 
                            <li><a href="#">ファッション</a></li>
                            <li><a href="#">ぺット</a></li>
                            <li>etc...</li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </footer>
        </div>



    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
    <!--IE11用-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <!--不必要なら削除してください-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
    <!--不必要なら削除してください-->
    <!--JSを読み込み-->
    <script src="{{ asset('js/team.js') }}"></script>
</body>

</html>