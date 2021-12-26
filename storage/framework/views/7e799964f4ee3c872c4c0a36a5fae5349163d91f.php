<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link href="<?php echo e(asset('css/team.css')); ?>" rel="stylesheet">
    <title>teamM.jp</title>

    <meta name="description" content="ユーザー専用間ページ" />
</head>
<body>
    <!--タイトル壁紙-->
    <section id="box1" class="box" data-section-name="title">
        <div class="header_list">
            
            <ul style="background-color: blanchedalmond;
                        background-size: 10px;
                        width: 180px;
                        height: 70px;
                        border-radius: 33px;
                        margin: 10px 0px 0px 1230px;">
                
                <a form="mypage-button" class="dropdown-item" type="submit" href="<?php echo e(route('login')); ?>">
                        マイページ
                </a>
                <a form="logout-button" class="dropdown-item" type="submit" href="<?php echo e(route('login')); ?>">
                        ログアウト
                </a>
            </ul>
        </div>

        <div class="wallpaper">
            <!--タイトル文字-->
            <div class="title">
                <p>teamM.jp</p>
            </div>
        
            <!--スクロール-->
            <div class="scrolldown1" style="z-index:2"><span>Scroll</span></div>
        
    <!--/box--></section>

    <section id="box2" class="box" data-section-name="about">
        <div class="box-area">
            <div class="profile-area blurTrigger">
            <h2>About this site <span>このサイトについて</span></h2>
                    <p>ここは皆さんの生活に役立つ知識を集めたサイトです。<br>知っているようで知らないこと、知っているととても便利なことなど、普段の生活が快適になる情報がたくさん投稿されています。
                        </br>このサイトを上手く活用して皆さんの生活が少しでも楽に、そして楽しくなれば幸いです・・・</p>
            </div>
        </div>
    <!--/box--></section>

    <!--タイムライン(ループ処理使う)-->
    <!--posttable created_at orderby-->
    <section id="box3" class="box" data-section-name="check new post">
        <section id="contents">
        <div class="tag">
            <p class="tag_design_new_post">最新の投稿</p>
        </div>
        <div id="contents" class="contents">
                <div id="main">
                    <ul id="pic">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( !$row ): ?> <?php continue; ?> <?php endif; ?>
                        <a href="<?php echo e(route('login')); ?>"><li class="item"> 
                            <h1 class="slider category"><?php echo e($row->title); ?></h1>
                            <img src="<?php echo e(Storage::url($row->category->img)); ?>" alt="<?php echo e($row->category->name); ?>" href="<?php echo e(route('login')); ?>">
                        </a>
                                <span class="category" href="<?php echo e(route('login')); ?>"><?php echo e($row->category->name); ?></span>
                        </li></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <section>
                    <a href="<?php echo e(route('login')); ?>" class="btn_02">もっとみる</a>
                </section>
        </div>
        </section>
    </section>

    <!--検索フォーム-->
    <section id="box4" class="box" data-section-name="search category">
        <div>
            <div class="tag">
                <p class="tag_design search">検索</p>
            </div>
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

            <form method="get" action="#" class="search_container">
                <input type="text" size="25" placeholder="キーワード検索"><input type="submit" value="&#xf002">
            </form>
            <ul class="slider">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if( !$row ): ?> <?php continue; ?> <?php endif; ?>
                    <a href="#top"><li><h1 class="slider category" href="<?php echo e(route('login')); ?>"><?php echo e($row->category->name); ?></h1><img src="<?php echo e(Storage::url($row->category->img)); ?>" href="<?php echo e(route('login')); ?>"></li></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!--/slider--></ul>
        </div>
    </section>

    <!-- フッター(最下部黒帯) -->
    <footer id="footer">
        <section class="primary">
          <div class="flex">
            <div class="left">
              <p class="logo"><a href="<?php echo e(route('login')); ?>">team M</a></p>
              <p class="address">
                〒000-0000 JAPAN<br>
                TEL : 000-000-000 / FAX : 000-000-0000
              </p>
              <ul class="sns-navi">
                <li><a href="<?php echo e(route('login')); ?>"><i class="fab fa-twitter"></i></a></li>
                <li><a href="<?php echo e(route('login')); ?>"><i class="fab fa-youtube"></i></a></li>
                <li><a href="<?php echo e(route('login')); ?>"><i class="fab fa-instagram"></i></a></li>
                <li><a href="<?php echo e(route('login')); ?>"><i class="fab fa-facebook"></i></a></li>
              </ul>
            </div>
            <div class="right">
              <div class="navi-section">
                <p class="parent"><a href="<?php echo e(route('login')); ?>">SITE</a></p>
                <ul class="navi">
                  <li><a href="<?php echo e(route('login')); ?>">about</a></li>
                  <li><a href="<?php echo e(route('login')); ?>">new post</a></li>
                  <li><a href="<?php echo e(route('login')); ?>">search</a></li>
                  <li><a href="<?php echo e(route('login')); ?>">???</a></li>
                </ul>
              </div>
              <div class="navi-section">
                <p class="parent"><a href="<?php echo e(route('login')); ?>">企業情報</a></p>
                <ul class="navi">
                  <li><a href="<?php echo e(route('login')); ?>">会社案内</a></li>
                  <li><a href="<?php echo e(route('login')); ?>">information</a></li>
                  <li><a href="<?php echo e(route('login')); ?>">IR</a></li>
                  <li><a href="<?php echo e(route('login')); ?>">CSR</a></li>
                  <li><a href="<?php echo e(route('login')); ?>">採用情報</a></li>
                </ul>
              </div>
              <div class="navi-section">
                <p class="parent"><a href="<?php echo e(route('login')); ?>">キャンペーン情報</a></p>
                <p class="parent"><a href="<?php echo e(route('login')); ?>">CMギャラリー</a></p>
                <p class="parent"><a href="<?php echo e(route('login')); ?>">お問い合わせ</a></p>
              </div>
            </div>
          </div>
        </section>
        <section class="secondary">
          <ul class="sitenavi">
            <li><a href="<?php echo e(route('login')); ?>">サイトマップ</a></li>
            <li><a href="<?php echo e(route('login')); ?>">プライバシーポリシー</a></li>
          </ul>
          <p class="copyright">Copyright TEAM M,Inc. All rights reserved.</p>
        </section>
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
    <!--JSを読み込み-->
    <script src="<?php echo e(asset('js/team.js')); ?>"></script>
    
<!-- /.wrap --></div>
</body>

</html><?php /**PATH /Users/Nozomi/Documents/GitHub/TWCP2/resources/views/toppage.blade.php ENDPATH**/ ?>