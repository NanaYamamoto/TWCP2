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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!--=============Google Font ===============-->
    <link href="https://fonts.googleapis.com/css?family=Baskervville%7CLa+Belle+Aurore&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:700" rel="stylesheet">

    <!--==============レイアウトを制御する独自のCSSを読み込み===============-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <!--ゆっくりズームアウトさせながら全画面で見せる-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">
    <!-- モーダルウィンドウ用 -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
    <!--自作のCSS-->
    <link href="{{ asset('css/toppage.css',true) }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="splash">
        <div id="splash-logo">読み込み中</div>

        <div class="splashbg"></div>
        <!---画面遷移用-->
    </div>
    <div class="scrolldown2"><span>Scroll</span></div>

    <header id="header">
        <div id="slider">
            <div class="heading-block">
                <h1 class="top_title">暮らしのサイト</h1>

                <!--/heading-block-->
            </div>
            <ul id="user-btn">
                <li><a href="{{ route('showLogin') }}">ログイン</a></li>
                <li><a href="{{ route('showRegist') }}">会員登録</a></li>
                <li><a href="#inline" class="inline">マイページ</a></li>
                <li><a href="#inline2" class="inline2">投稿する</a></li>

                <div id="inline" style="display:none;">
                    <p>マイページを開くにはログインをする必要があります。</p>
                    <p><a class="inline_close"></a></p>
                </div>
                <div id="inline2" style="display:none;">
                    <p>投稿をするにはログインをする必要があります。</p>
                    <p><a class="inline_close"></a></p>
                </div>
            </ul>
            <!--/slider-->
        </div>
    </header>
    <main>
        <section id="box1" class="box" data-section-name="Profile">
            <div class="box-area">
                <div class="profile-area blurTrigger">
                    <h2>About this site <span>このサイトについて</span></h2>
                    <p>ここは皆さんの生活に役立つ知識を集めたサイトです。<br>知っているようで知らないこと、知っているととても便利なことなど、普段の生活が快適になる情報がたくさん投稿されています。
                        </br>このサイトを上手く活用して皆さんの生活が少しでも楽に、そして楽しくなれば幸いです・・・</p>

                </div>
            </div>
            <!--/box-->
        </section>

        <section id="box2" class="box" data-section-name="Landscape">
            <div class="box-area">
                <h2 class="picup eachTextAnime">picup</h2>
                <ul class="slider_width">
                    <li><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""></li>
                    <li><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""></li>
                    <li><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""></li>
                    <li><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""></li>
                    <li><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""></li>
                    <li><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""></li>

                </ul>
                <a href="#gallery-1" class="gradient4 blurTrigger">View All</a>
                <!--/box-area-->
            </div>

        </section>

        <section id="box3" class="box" data-section-name="post">
            <div class="box-area">
                <h2 class="eachTextAnime">記事を投稿するには会員登録が必要です</h2>
                <a href="{{ route('showLogin') }}" class="btnchangeline blurTrigger"><span>ログイン</span></a>
                <!--/box-area-->

            </div>
            <div id="gallery-2" class="hide-area">
                <p><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""><span class="caption">Woman 2001</span></p>
                <p><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""><span class="caption">Woman 2002</span></p>
                <p><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""><span class="caption">Woman 2003</span></p>
                <p><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""><span class="caption">Woman 2004</span></p>
                <p><img src="{{ asset('/images/画像/キッチン.jpeg') }}" alt=""><span class="caption">Woman 2005</span></p>
            </div>
            <!--/box-->
        </section>


    </main>


    <footer id="footer">
        <p id="page-top"><a href="#">Page Top</a></p>
        <small>&copy; copyright.</small>
    </footer>

    <!--=============JS ===============-->
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!--機能編 4-1-3プログレスバー＋数字カウントアップ＋画面が開く-->
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
    <!--IE11用　不必要なら削除-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
    <!--機能編 6-1-3 ゆっくりズームアウトさせながら全画面で見せる-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.js"></script>
    <!--機能編 9-6-3 モーダル！！！-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
    <!--印象編　6-1　スクロールすると1画面移動-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.21/jquery.scrollify.min.js"></script>
    <!--自作のJS-->
    <script src="{{ asset('js/toppage.js') }}"></script>
</body>

</html>