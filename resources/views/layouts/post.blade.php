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

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .dropdown-item {
      margin: 0;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .menu-btn {
      position: fixed;
      top: 45px;
      right: 10px;
      display: flex;
      height: 60px;
      width: 60px;
      justify-content: center;
      align-items: center;
      z-index: 90;
      background-color: #3584bb;
    }

    .menu-btn span,
    .menu-btn span:before,
    .menu-btn span:after {
      content: '';
      display: block;
      height: 3px;
      width: 25px;
      border-radius: 3px;
      background-color: #ffffff;
      position: absolute;
    }

    .menu-btn span:before {
      bottom: 8px;
    }

    .menu-btn span:after {
      top: 8px;
    }

    #menu-btn-check:checked~.menu-btn span {
      background-color: rgba(255, 255, 255, 0);
      /*メニューオープン時は真ん中の線を透明にする*/
    }

    #menu-btn-check:checked~.menu-btn span::before {
      bottom: 0;
      transform: rotate(45deg);
    }

    #menu-btn-check:checked~.menu-btn span::after {
      top: 0;
      transform: rotate(-45deg);
    }

    #menu-btn-check {
      display: none;
    }

    .menu-content {
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0;
      left: 100%;
      /*leftの値を変更してメニューを画面外へ*/
      z-index: 80;
      background-color: #3584bb;
      transition: all 0.5s;
      /*アニメーション設定*/
    }

    .menu-content ul {
      padding: 70px 10px 0;
    }

    .menu-content ul li {
      border-bottom: solid 1px #ffffff;
      list-style: none;
    }

    .menu-content ul li a {
      display: block;
      width: 100%;
      font-size: 15px;
      box-sizing: border-box;
      color: #ffffff;
      text-decoration: none;
      padding: 9px 15px 10px 0;
      position: relative;
    }

    .menu-content ul li a::before {
      content: "";
      width: 7px;
      height: 7px;
      border-top: solid 2px #ffffff;
      border-right: solid 2px #ffffff;
      transform: rotate(45deg);
      position: absolute;
      right: 11px;
      top: 16px;
    }

    .menu-content {
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 80;
      background-color: #3584bb;
    }

    .menu-content ul {
      padding: 70px 10px 0;
    }

    .menu-content ul li {
      border-bottom: solid 1px #ffffff;
      list-style: none;
    }

    .menu-content ul li a {
      display: block;
      width: 100%;
      font-size: 15px;
      box-sizing: border-box;
      color: #ffffff;
      text-decoration: none;
      padding: 9px 15px 10px 0;
      position: relative;
    }

    .menu-content ul li a::before {
      content: "";
      width: 7px;
      height: 7px;
      border-top: solid 2px #ffffff;
      border-right: solid 2px #ffffff;
      transform: rotate(45deg);
      position: absolute;
      right: 11px;
      top: 16px;
    }

    #menu-btn-check:checked~.menu-content {
      left: 0;
      /*メニューを画面内へ*/
    }

    .menu-content {
      width: 100%;
      height: 100%;
      position: fixed;
      top: 0;
      left: 100%;
      /*leftの値を変更してメニューを画面外へ*/
      z-index: 80;
      background-color: #3584bb;
      transition: all 0.5s;
      /*アニメーション設定*/
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #ae1c17;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
      @if(Auth::user())
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
        </a>
        <!-- 上のaのクラスdropdown-toggleを消すと三角のアイコンも消えます -->
        <!-- ↓ここはログインユーザーがログアウトするときに使う -->

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
            {{ __('ログアウト') }}<i class="fas fa-sign-out-alt"></i>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
        @endif
      </li>
    </ul>

  </header>
  <div class="hamburger-menu">
    <input type="checkbox" id="menu-btn-check">
    <label for="menu-btn-check" class="menu-btn"><span></span></label>
    <!--ここからメニュー-->
    <div class="menu-content">
      <ul>
      <li>
        <a href="{{route('post.login')}}" class="btn btn-outline-primary">ログイン</a>
        </li>
        <li>
        <a href="{{route('post.regist')}}" class="btn btn-outline-primary">新規作成</a>
        </li>
        <li>
        <a href="{{route('post.profile')}}" class="btn btn-outline-primary">マイページ</a>
        </li>
        
      </ul>
    </div>
    <!--ここまでメニュー-->
  </div>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">
                <span data-feather="home"></span>
                {{ '全て' }}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="">ダッシュボード</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="">注文</a>
            </li>
            
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('contents')
      </main>
    </div>
  </div>

  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>