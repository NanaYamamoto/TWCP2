<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
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

    <link href="<?php echo e(asset('css/team.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/top.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body style="background-color: white;">
    <header class="header">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3 ml-4 pl-5">
            <a class="navbar-brand" href="/">teamM.jp</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('member.post.profile')); ?>">プロフィール</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('member.post.regist')); ?>">記事作成</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#searchpost">記事検索</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('member.archive')); ?>">アーカイブ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#follower">フォロワー</a>
                    </li>
                </ul>

            </div>

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
                            <img src="images/画像/living.png" alt="インテリア">
                            
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
                            <h1>便利なスマホアプリ5選</h1>
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
    <script src="<?php echo e(asset('js/team.js')); ?>"></script>

</body>

</html>

<?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/member/archive/archive.blade.php ENDPATH**/ ?>