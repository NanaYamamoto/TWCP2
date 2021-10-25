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

    <!-- モーダルウィンドウ用 -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
    
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
        <header id="header">
            <h1><a href="#">暮らしのアプリ</a></h1>

            
            <nav id="f-nav">
                <div id="f-nav-list">
                    <ul id="g-navi" class="nav01c">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.register') }}"><i class="fas fa-user-plus mr-1"></i>ユーザー登録</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link mr-2" href="{{ route('post.login') }}"><i class="fas fa-sign-in-alt mr-1"></i>ログイン</a>
                        </li>
                        <li class="nav-item open-btn">
                        <i class="fas fa-search" style="
                        color: #fff;
                        text-decoration: none;
                        padding-top: 10px;
                        display: block;
                        text-transform: uppercase;
                        letter-spacing: 0.1em;
                        font-weight: bold;">
                        </i>
                        </li>


                        @endguest

                        @auth()
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.regist') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
                        </li>
                        <li class="has-child"><a href="#" class="nav-link">{{ Auth::user()->name }}さん</a>
                            <ul>
                                <li><button form="mypage-button" class="dropdown-item" type="submit">
                                        マイページ
                                    </button></li>
                                <li><button form="logout-button" class="dropdown-item" type="submit">
                                        ログアウト
                                    </button></li>
                            </ul>
                        </li>
                        <li class="nav-item open-btn">
                        <i class="fas fa-search" style="
                        color: #aaa;
                        text-decoration: none;
                        padding-top: 10px;
                        display: block;
                        text-transform: uppercase;
                        letter-spacing: 0.1em;
                        font-weight: bold;">
                        </i>
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
            
        </header>

        <div id="search-wrap">
            <div class="close-btn"><span></span><span></span></div>
            <div class="search-area">
                <form role="search" method="get" action="">
                    <input type="text" value="" name="keyword" id="search-text" placeholder="search">
                    <input type="submit" id="searchsubmit" value="">
                </form>
            </div>
            <!--/search-wrap-->
        </div>

        <!--タイトル壁紙-->
        <div class="wallpaper">

            <section class="container">
                <div class="main_img">
                    <img src="/images/画像/background.jpeg" alt="">
                </div>
                <h3 class="main_copy">普段の暮らしをもっと便利に、<br>もっと楽しく、<br>It is such an application.</h3>

            </section>

            <!--ページトップ-->

        </div>

        

        <!--ラインナップ-->
        <div class="container-fluid">
            <div class="row">
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
                            <div id="category-list">
                                <!--ナビの数が増えた場合縦スクロールするためのdiv-->

                                <ul>
                                    <li><i class="fas fa-tags mb-2"></i>タグ</li>
                                    @foreach( $categories as $category )
                                    <li><a href="#">{{ $category }}</a></li>

                                    @endforeach
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

    <!-- モーダルウィンドウ用 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
    <!--JSを読み込み-->
    <script src="{{ asset('js/team.js') }}"></script>
</body>

</html>