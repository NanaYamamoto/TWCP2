<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/mypage.css">

    <title>teamM.jp</title>

    <meta name="description" content="アーカイブページ" />
</head>

    <!--カテゴリー(アコーディオン)-->
    <footer id="globalfooter">
        <div class="lib-wrap">
            <div class="box-lid-menu">
                <div class="openbtn"><span></span><span></span><span></span></div>
                <nav id="g-nav">
                    <div id="category-list">
                        <!--ナビの数が増えた場合縦スクロールするためのdiv-->
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

    <!--ヘッダー(黒帯)-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-3 mb-3" id="header">
        <a class="navbar-brand" href="http://localhost/team/team.html">teamM.jp</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#profile">プロフィール</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#create">記事作成</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#search">記事検索</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#archive">アーカイブ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">フォロワー</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="top">
        <p>アーカイブ</p>
    </div>

    <!--タイムライン(ループ処理使う)-->
    <section id="contents">
        <div id="contents" class="contents">
            <div id="main">
                <ul id="pic">
                    <li class="item">
                        <h1>インテリア収納</h1>
                        <img src="/images/画像/インテリア.png" alt="インテリア">

                        <span class="category" href="#">インテリア</span>
                        <figure>
                            <a target="_blank" href="#" title="インテリア">

                            </a>
                        </figure>
                    </li>
                    <li class="item">
                        <h1>キッチン収納</h1>
                        <img src="/images/画像/キッチン.jpeg" alt="キッチン">

                        <span class="category" href="#">キッチン</span>
                        <figure>
                            <a target="_blank" href="#" title="キッチン">

                            </a>
                        </figure>
                    </li>
                    <li class="item">
                        <h1>効率のいい筋トレ方法</h1>
                        <img src="/images/画像/スポーツ.png" alt="筋トレ">

                        <span class="category" href="#">筋トレ</span>
                        <figure>
                            <a target="_blank" href="#" title="筋トレ">

                            </a>
                        </figure>
                    </li>
                    <li class="item">
                        <h1>犬のしつけ方</h1>
                        <img src="/images/画像/ペット.jpeg" alt="インテリア">

                        <span class="category" href="#">ペット</span>
                        <figure>
                            <a target="_blank" href="#" title="ペット">

                            </a>
                        </figure>
                    </li>
                    <li class="item">
                        <h1>おすすめゲーム</h1>
                        <img src="/images/画像/ペット.jpeg" alt="ゲーム">

                        <span class="category" href="#">ゲーム</span>
                        <figure>
                            <a target="_blank" href="#" title="ゲーム">

                            </a>
                        </figure>
                    </li>
                    <li class="item">
                        <h1>インテリア収納</h1>
                        <img src="/images/画像/インテリア.png" alt="インテリア">

                        <span class="category" href="#">インテリア</span>
                        <figure>
                            <a target="_blank" href="#" title="インテリア">

                            </a>
                        </figure>
                    </li>
                    <li class="item">
                        <h1>インテリア収納</h1>
                        <img src="/images/画像/インテリア.png" alt="インテリア">

                        <span class="category" href="#">インテリア</span>
                        <figure>
                            <a target="_blank" href="#" title="インテリア">

                            </a>
                        </figure>
                    </li>
                    <li class="item">
                        <h1>インテリア収納</h1>
                        <img src="/images/画像/インテリア.png" alt="インテリア">

                        <span class="category" href="#">インテリア</span>
                        <figure>
                            <a target="_blank" href="#" title="インテリア">

                            </a>
                        </figure>
                    </li>
                    <li class="item">
                        <h1>インテリア収納</h1>
                        <img src="/images/画像/インテリア.png" alt="インテリア">

                        <span class="category" href="#">インテリア</span>
                        <figure>
                            <a target="_blank" href="#" title="インテリア">

                            </a>
                        </figure>
                    </li>

                </ul>
            </div>
        </div>
    </section>


    <!-- フッター(最下部黒帯) -->
    <footer class="text-center bg-dark text-white" id="footer">
        <p class="py-3">teamM.jp</p>
    </footer>

</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
<!--IE11用-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
<!--JSを読み込み-->
<script src="/js/mypage.js"></script>
</body>


</html><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/member/archive/archive.blade.php ENDPATH**/ ?>