@extends('sample.layout')

@section('contents')
{{--
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

    <h2 style="position: absolute;top: 180px;left: 100px;font-size: 1.5rem;font-weight: bold;"><a href="#">Topics</a></h2>
    <ul id="gallery" class="gallery bgappearTrigger">
        <li class="bgextend bgLRextendTrigger zoomInRotate">
            <div class="bgappearTrigger"><a href="" data-lightbox="gallery-group"><img src="/images/画像/インテリア.png" alt=""></a>
                <p>ああああああ</p>
            </div>
        </li>
        <li class="bgextend bgLRextendTrigger zoomInRotate">
            <div class="bgappearTrigger"><a href="" data-lightbox="gallery-group"><img src="/images/画像/インテリア.png" alt=""></a>
                <p>ああああああ</p>
            </div>
        </li>
        <li class="bgextend bgLRextendTrigger zoomInRotate">
            <div class="bgappearTrigger"><a href="" data-lightbox="gallery-group"><img src="/images/画像/インテリア.png" alt=""></a>
                <p>ああああああ</p>
            </div>
        </li>
        <li class="bgextend bgLRextendTrigger zoomInRotate">
            <div class="bgappearTrigger"><a href="" data-lightbox="gallery-group"><img src="/images/画像/インテリア.png" alt=""></a>
                <p>ああああああ</p>
            </div>
        </li>
        <li class="bgextend bgLRextendTrigger zoomInRotate">
            <div class="bgappearTrigger"><a href="" data-lightbox="gallery-group"><img src="/images/画像/インテリア.png" alt=""></a>
                <p>ああああああ</p>
            </div>
        </li>
        <li class="bgextend bgLRextendTrigger zoomInRotate">
            <div class="bgappearTrigger"><a href="" data-lightbox="gallery-group"><img src="/images/画像/インテリア.png" alt=""></a>
                <p>ああああああ</p>
            </div>
        </li>
        <li class="bgextend bgLRextendTrigger zoomInRotate">
            <div class="bgappearTrigger"><a href="" data-lightbox="gallery-group"><img src="/images/画像/インテリア.png" alt=""></a>
                <p>ああああああ</p>
            </div>
        </li>
        <li class="bgextend bgLRextendTrigger zoomInRotate">
            <div class="bgappearTrigger"><a href="" data-lightbox="gallery-group"><img src="/images/画像/インテリア.png" alt=""></a>
                <p>ああああああ</p>
            </div>
        </li>
    </ul>





    <div id="container" class="wrapper">
        <main>
            @if( count($rows) )

            <article>
                <h1 class="article-title" style="font-size: 1.5rem; padding-bottom: 30px;"><a href="#">おすすめの投稿</a></h1>
                @foreach( $rows as $row )
                <p><a href="#">{{ $row->title }}</a></h2>
                <ul class="meta">
                    <li><a href="#">{{ $row->created_at }}</a></li>
                    <li><a href="#">{{ $row->category_id }}</a></li>
                    <li><a href="#">{{ $row->user->name }}さんの投稿</a></li>
                </ul>
                <a href="#"><img src="/images/画像/インテリア.png" alt="テキストテキストテキスト"></a>
                <p class="text">
                    {{ $row->content }}
                </p>
                <div class="readmore"><a href="#">READ MORE</a></div>
                @endforeach
            </article>




            @else
            <span>記事がありません</span>
            @endif
        </main>

        <aside id="sidebar">

            <section id="news">

                <div class="tab-area bgextend">
                    <div class="bgappear">
                        <ul class="tab">

                            <li><a href="#recommendation">あなたへのおすすめ</a></li>
                            <li><a href="#cars">人気記事</a></li>
                        </ul>
                        <div class="tab-choice-area">

                            <div id="recommendation" class="area is-active">
                                <ul>
                                    <li><a href="#"><time datetime="2021-09-23">2021.09.23</time>PHP</a></li>
                                    <li><a href="#"><time datetime="2021-07-15">2021.07.15</time>Javascript</a></li>
                                    <li><a href="#"><time datetime="2021-05-12">2021.05.12</time>Laravel</a></li>
                                </ul>
                                <!--/area-->
                            </div>
                            <div id="cars" class="area">
                                <ul>
                                    <li><a href="#"><time datetime="2021-11-11">2021.11.11</time>インポートカーお披露目</a></li>
                                    <li><a href="#"><time datetime="2021-06-07">2021.06.07</time>ドイツ・フランス車フェア</a></li>
                                    <li><a href="#"><time datetime="2021-03-01">2021.03.01</time>買い替えをご検討中の方へ</a></li>
                                </ul>
                                <!--/area-->
                            </div>
                            <!--/tab-choice-area-->
                        </div>
                    </div>
                    <!--/tab-area-->
                </div>
            </section>
            <section class="archive">
                <h3 class="side-title">人気投稿者一覧</h3>
                <ul>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                    <li><a href="#">林航平</a>(XX)</li>
                </ul>
            </section>
        </aside>
    </div>

--}}
@endsection