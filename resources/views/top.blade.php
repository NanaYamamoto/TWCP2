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
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3">
            <a class="navbar-brand" href="{{ route('member.mypage') }}">teamM.jp</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('member.post.profile') }}">マイページ</a>
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


    <div id="container" class="wrapper">
        <main>
            <article>
                <div class="top">
                    <p>投稿</p>
                </div>
                @if( count($rows) )
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
                <div style="display: block; text-align: center;">
                    <a href="{{route('member.post.detail', $row->id)}}" data-lightbox="gallery-group">
                        @if (!empty($row->img))
                        <img src="{{$row->img}}" style="object-fit: cover; width: 350px; height: 350px;">
                        @else
                        <img src="{{ $row->category->img}}" style="object-fit: cover; width: 350px; height: 350px;">
                        @endif
                    </a>
                    <p class="text">
                        {{ $row->content }}
                    </p>
                </div>


                <div class="readmore"><a href="{{route('member.post.detail', $row->id)}}">READ MORE</a></div>
                @endforeach
            </article>
            {{$rows->links()}}
            @else
            <span>記事がありません</span>
            @endif
        </main>


    </div>

    <footer class="text-center bg-dark text-white">
        <p class="py-3">teamM.jp</p>
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