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

    <link href="{{ asset('css/toppage.css') }}" rel="stylesheet">

    <link href="{{ asset('css/top.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body style="background-color: white;">
    <header class="header">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3 ml-4 pl-5">
            <a class="navbar-brand" href="{{ route('member.mypage') }}">teamM.jp</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('member.post.profile') }}">プロフィール</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('member.post.regist') }}">記事作成</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('member.post.search') }}">記事検索</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('member.archive') }}">アーカイブ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#follower">フォロワー</a>
                    </li>
                </ul>

            </div>
            <div class="header_list">
                <ul>
                    @auth
                    <li class="has-child"><a href="#" class="nav-link"><i class="fas fa-user-alt"></i></a>
                        <ul>
                            <li><button form="mypage-button" class="dropdown-item" type="submit">
                                    プロフィール
                                </button></li>
                            <li><button form="logout-button" class="dropdown-item" type="submit">
                                    ログアウト
                                </button></li>
                        </ul>
                    </li>
                    @else
                    @endauth
                    <li class="nav-item open-btn" style="
                            position: static;
                            display: flex;
                            justify-content: center;
                            flex-direction: column;
                            height: auto;
                            cursor: pointer;
                            z-index: 999;
                            color: #fff;">
                        <i class="fas fa-search">
                        </i>
                    </li>
                </ul>
            </div>

            <form id="mypage-button" method="POST" action="{{ route('member.post.profile_edit') }}">
                @csrf
            </form>
            <form id="logout-button" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
        </nav>
    </header>



    <div id="search-wrap">
        <div class="close-btn"><span></span><span></span></div>
        <div class="search-area">
            <form role="search" method="post">
                @csrf
                <input type="text" value="" name="keyword" id="search-text" placeholder="search">
                <input type="submit" id="searchsubmit" name="btnSearch" value="検索">
            </form>
        </div>
        <!--/search-wrap-->
    </div>

    <footer id="globalfooter">
        <div class="lib-wrap">
            <div class="box-lid-menu">
                <div class="openbtn" style="left: 0; background: #5ea0ae!important;"><span></span><span></span><span></span></div>
                <nav id="g-nav" class="">
                    <div id="category-list">
                        <!--ナビの数が増えた場合縦スクロールするためのdiv-->
                        <ul>
                            <li><i class="fas fa-tags mb-2"></i>タグ</li>
                            @if( count($categories) )
                            @foreach( $categories as $category )
                            <li><a href="#">{{ $category }}</a></li>
                            @endforeach
                            <li>etc...</li>
                            @else
                            <span>タグがありません</span>
                            @endif
                        </ul>

                    </div>

                </nav>
            </div>
        </div>
    </footer>


    <div id="container" class="wrapper">
        <main>
            @if( count($rows) )
            <article>
                <h1 class="article-title" style="font-size: 1.5rem; padding-bottom: 30px;">投稿</h1>
                @foreach( $rows as $row )
                <p>{{ $row->title }}</h2>
                <ul class="meta">
                    <li>{{ $row->created_at }}</li>
                    <li>{{ $row->category->name }}</li>
                </ul>
                <ul class="meta" style="display: flex; align-items: center;">
                    <li>
                        @if (!empty($user->icon_url))
                        <img src="/storage/members/{{$user->icon_url}}" class="rounded-circle" style="object-fit: cover; width: 50px; height: 50px;">
                        @else
                        <img src="/images/blank_profile.png" class="rounded-circle" style="object-fit: cover; width: 50px; height: 50px;">
                        @endif
                    </li>
                    <li><a href="{{route('member.post.detail', $row->id)}}">{{ $row->user->name }}さんの投稿</a></li>

                </ul>

                <a href="{{route('member.post.detail', $row->id)}}" data-lightbox="gallery-group">
                    @if (!empty($row->img))
                    <img src="{{$row->img}}" style="object-fit: cover; width: 1000px; height: 1000px;">
                    @else
                    <img src="/images/blank_profile.png" style="object-fit: cover; width: 1000px; height: 1000px;">
                    @endif
                </a>

                <p class="text">
                    {{ $row->content }}
                </p>
                <div class="readmore"><a href="{{route('member.post.detail', $row->id)}}">READ MORE</a></div>
                @endforeach
            </article>
            @else
            <span>記事がありません</span>
            @endif
        </main>


    </div>

    <footer id="footer">


        <p class="copyright">&copy; TWCP</p>
    </footer>

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
    <script src="{{ asset('js/top.js') }}"></script>

</body>

</html>