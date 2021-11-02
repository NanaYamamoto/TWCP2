@extends('layouts.team.team')




@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
    <h1 class="h2">News</h1>
</div>

<section id="news">

    <div class="tab-area bgextend bgLRextendTrigger bgLRextend">
        <div class="bgappearTrigger bgappear">
            <ul class="tab">
                <li class="active"><a href="#topics">最近のTopics</a></li>
                <li><a href="#recommendation">あなたへのおすすめ</a></li>
                <li><a href="#cars">人気記事</a></li>
            </ul>
            <div class="tab-choice-area">
                <div id="topics" class="area is-active">
                    <ul>
                        <li><a href="#"><time datetime="2021-12-23">2021.12.23</time>メンテナンス</a></li>
                        <li><a href="#"><time datetime="2021-11-01">2021.11.01</time>私たちについて</a></li>
                        <li><a href="#"><time datetime="2021-10-02">2021.10.01</time>TWCPついにリリース！！！</a></li>
                    </ul>
                    <!--/area-->
                </div>
                <div id="recommendation" class="area">
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


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
    <h1 class="h2">投稿</h1>
</div>
<div class="l-main-container" data-main-container="true" style="margin-top:40px;">
    <main class="l-main" data-main="true" data-transition="fadeIn">
        <div class="box-index-container" data-article-index-container="true">
            <div class="box-index-section" data-article-index="true">
                <div class="box-index-section__inner">
                    <div class="box-index-section__num">
                        <span class="box-index-section__num-text"></span>
                    </div>

                    <ul class="box-index-section_list list-index">
                        @if( count($rows) )
                        @foreach( $rows as $row )
                        <li class="list-index__item" data-article-index-item="true">
                            <a href="#" target="_blank" rel="noopener" class="list-index__target" data-article-index-item-elem="link" data-fetch-link="true">
                                <figure class="list-index__image">
                                    <img width="890" height="650" src="/storage/members/{{$row->user->icon_url}}" class="attachment- size- wp-post-image" alt="" loading="lazy" data-article-index-item-elem="image" sizes="(max-width: 890px) 100vw, 890px"> <span class="list-index__image-icon">
                                        <svg width="24" height="19" viewBox="0 0 24 19" class="list-index__image-icon-svg">
                                            <path class="list-index__image-icon-arrow" d="M23.9,5l-6.3-4.9C17.5,0,17.4,0,17.3,0c-0.1,0-0.2,0.1-0.2,0.3v2.3c-0.7,0.1-2.9,0.6-4.8,1.9C10,6,8.1,8.5,7.8,9.9c0,0.1,0,0.2,0.1,0.3c0,0,0.1,0,0.1,0c0.1,0,0.1,0,0.2-0.1c1.2-1,3.6-1.9,4.6-2.3c1.4-0.5,2.8-0.7,4.3-0.5v2.5c0,0.1,0.1,0.2,0.2,0.3c0.1,0,0.2,0,0.3,0l6.3-4.8C24,5.3,24,5.3,24,5.2C24,5.1,24,5,23.9,5"></path>
                                            <path class="list-index__image-icon-box" d="M20.1,11.2v3.9c0,0.4-0.3,0.8-0.8,0.8H3.9c-0.4,0-0.8-0.3-0.8-0.8V4.2c0-0.4,0.3-0.8,0.8-0.8h4.6V0.4H3.9C1.7,0.4,0,2.1,0,4.2v10.8c0,2.1,1.7,3.9,3.9,3.9h15.5c2.1,0,3.9-1.7,3.9-3.9v-3.9H20.1z"></path>
                                        </svg>
                                    </span>
                                </figure>
                                <div class="list-index__title" data-article-index-item-elem="title">{{ $row->user->name }}</div>
                                <div class="list-index__time">
                                    <time datetime="2021-10-04T09:03">{{ $row->created_at }}</time>
                                </div>
                            </a>
                            <!-- <div class="list-index__detail">
                                <a href="https://io3000.com/bm/dcs/" data-transition-type="overlay" data-article-index-item-elem="detail" class="list-index__detail-target" data-fetch-link="true">
                                    <svg width="20" height="20" viewBox="0 0 20 20" class="list-index__detail-icon" aria-label="Detail">
                                        <use xlink:href="#svg-icon-detail"></use>
                                    </svg>
                                </a>
                            </div> -->
                        </li>
                        @endforeach
                        @else
                        <span>記事がありません</span>
                        @endif
                    </ul>

                </div>
                <div class="pt30 text-center">
                    <a href="/products/" class="btn btn-outline btn-arrow-right">VIEW MORE</a>
                </div>
            </div>
        </div>
    </main>
</div>

<p><a href="#login" class="confirm">→ 確認画面モーダルリンク</a></p> 
    <section id="login" class="hide-area"></section>

<ul id="gallery" class="gallery">
		<li class="bgextend bgLRextendTrigger zoomInRotate"><div class="bgappearTrigger"><a href="img/gal_01_l.jpg" data-lightbox="gallery-group" data-title="2025.11.03 新車が入荷しました！"><img src="/images/画像/インテリア.png" alt=""></a></div></li>
		<li class="bgextend bgLRextendTrigger zoomInRotate"><div class="bgappearTrigger"><a href="img/gal_02_l.jpg" data-lightbox="gallery-group" data-title="2025.11.03 新車が入荷しました！"><img src="/images/画像/03-light-carpet.png" alt=""></a></div></li>
		<li class="bgextend bgLRextendTrigger zoomInRotate"><div class="bgappearTrigger"><a href="img/gal_03_l.jpg" data-lightbox="gallery-group" data-title="2025.11.03 新車が入荷しました！"><img src="/images/画像/03-light-carpet.png" alt=""></a></div></li>
		<li class="bgextend bgLRextendTrigger zoomInRotate"><div class="bgappearTrigger"><a href="img/gal_04_l.jpg" data-lightbox="gallery-group" data-title="2025.11.03 新車が入荷しました！"><img src="/images/画像/03-light-carpet.png" alt=""></a></div></li>
		<li class="bgextend bgLRextendTrigger zoomInRotate"><div class="bgappearTrigger"><a href="img/gal_05_l.jpg" data-lightbox="gallery-group" data-title="2025.11.03 新車が入荷しました！"><img src="/images/画像/03-light-carpet.png" alt=""></a></div></li>
		<li class="bgextend bgLRextendTrigger zoomInRotate"><div class="bgappearTrigger"><a href="img/gal_06_l.jpg" data-lightbox="gallery-group" data-title="2025.11.03 新車が入荷しました！"><img src="/images/画像/03-light-carpet.png" alt=""></a></div></li>
		<li class="bgextend bgLRextendTrigger zoomInRotate"><div class="bgappearTrigger"><a href="img/gal_07_l.jpg" data-lightbox="gallery-group" data-title="2025.11.03 新車が入荷しました！"><img src="/images/画像/03-light-carpet.png" alt=""></a></div></li>
		<li class="bgextend bgLRextendTrigger zoomInRotate"><div class="bgappearTrigger"><a href="img/gal_08_l.jpg" data-lightbox="gallery-group" data-title="2025.11.03 新車が入荷しました！"><img src="/images/画像/03-light-carpet.png" alt=""></a></div></li>
</ul>
<div class="bgextend bgLRextendTrigger">
    <div class="bgappearTrigger">
    </div>
</div>
@endsection