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

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <!--自作のCSS-->
    <link href="{{ asset('css/toppage.css') }}" rel="stylesheet">

    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<div class="wrap">
    <body>
    
        <!--タイトル壁紙-->
        <section id="box1" class="box" data-section-name="title">
            <div class="wallpaper">
                <!--タイトル文字-->
                <div class="title">
                    <p>teamM.jp</p>
                </div>
            
                <!--スクロール-->
                <div class="scrolldown1" style="z-index:2"><span>Scroll</span></div>
            
        <!--/box--></section>
    
        
    
        <section id="box2" class="box" data-section-name="Area2">
            <div class="box-area">
                <div class="profile-area blurTrigger">
                <h2>About this site <span>このサイトについて</span></h2>
                        <p>ここは皆さんの生活に役立つ知識を集めたサイトです。<br>知っているようで知らないこと、知っているととても便利なことなど、普段の生活が快適になる情報がたくさん投稿されています。
                            </br>このサイトを上手く活用して皆さんの生活が少しでも楽に、そして楽しくなれば幸いです・・・</p>
                </div>
            </div>
        <!--/box--></section>
    
        <!--タイムライン(ループ処理使う)-->
        <section id="box3" class="box" data-section-name="最新の投稿をチェックしてみましょう">
            <section id="contents">
            <div class="top">
                <p>最新の投稿</p>
            </div>
            <div id="contents" class="contents">
                    <div id="main">
                        <ul id="pic">
                            <li class="item">
                                <h1>インテリア収納</h1>
                                <img src="images/画像/インテリア.png" alt="インテリア">
                                
                                    <span class="category" href="#">インテリア</span>
                                    <figure>
                                        <a target="_blank" href="#" title="インテリア">
                                            
                                        </a>
                                    </figure>
                            </li>
                            <li class="item">
                                <h1>キッチン収納</h1>
                                <img src="images/画像/キッチン.jpeg" alt="キッチン">
                                
                                    <span class="category" href="#">キッチン</span>
                                    <figure>
                                        <a target="_blank" href="#" title="キッチン">
                                            
                                        </a>
                                    </figure>
                            </li>
                            <li class="item">
                                <h1>効率のいい筋トレ方法</h1>
                                <img src="images/画像/筋トレ.jpg" alt="筋トレ">
                                
                                    <span class="category" href="#">筋トレ</span>
                                    <figure>
                                        <a target="_blank" href="#" title="筋トレ">
                                            
                                        </a>
                                    </figure>
                            </li>
                            <li class="item">
                                <h1>犬のしつけ方</h1>
                                <img src="images/画像/犬.jpg" alt="インテリア">
                                
                                    <span class="category" href="#">ペット</span>
                                    <figure>
                                        <a target="_blank" href="#" title="ペット">
                                            
                                        </a>
                                    </figure>
                            </li>
                            <li class="item">
                                <h1>おすすめゲーム</h1>
                                <img src="images/画像/ゲーム.jpg" alt="ゲーム">
                                
                                    <span class="category" href="#">ゲーム</span>
                                    <figure>
                                        <a target="_blank" href="#" title="ゲーム">
                                            
                                        </a>
                                    </figure>
                            </li>
                            <li class="item">
                                <h1>スマホの裏技</h1>
                                <img src="images/画像/スマホ.jpg" alt="スマホ">
                                
                                    <span class="category" href="#">スマホ</span>
                                    <figure>
                                        <a target="_blank" href="#" title="スマホ">
                                            
                                        </a>
                                    </figure>
                            </li>
                        </ul>
                    </div>
    
                    <section>
                        <a href="#" class="btn_02">もっとみる</a>
                    </section>
            </div>
            </section>
        </section>
    
        <!--検索フォーム-->
        <section id="box4" class="box" data-section-name="ワードで検索してみましょう">
            <div>
                <canvas id="waveCanvas"></canvas>
                <div class="search">
                    <p>検索</p>
                </div>
                <form id="form4" action="自分のサイトURL" method="get">
                    <input id="sbox4"  id="s" name="s" type="text" placeholder="フリーワードを入力" />
                    <button id="sbtn4" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <ul class="slider">
                    <li><img src="images/画像/living.png" alt=""></li>
                    <li><img src="images/画像/ゲーム.jpg" alt=""></li>
                    <li><img src="images/画像/スマホ.jpg" alt=""></li>
                    <li><img src="images/画像/宇宙.jpg" alt=""></li>
                    <li><img src="images/画像/犬2.jpg" alt=""></li>
                    <!--/slider--></ul>
            </div>
        </section>
    
    
        <!-- フッター(最下部黒帯) -->
        <footer class="text-center bg-dark text-white" id="footer">
            <p class="py-3">teamM.jp</p>
        </footer>
    
        </div>
    
        <!-- JavaScript Bundle with Popper -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
        <!--IE11用-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.21/jquery.scrollify.min.js"></script>
        
    <!-- /.wrap --></div>
    </body>

</html>