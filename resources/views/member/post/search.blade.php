@extends('layouts.member')

<!-- @section('css') -->

@section('title')
検索記事表示
@endsection

@section('css')
<link href="{{ asset('css/top.css') }}" rel="stylesheet">
@endsection

@section('content')
<!--記事作成-->

<div class="top" style="margin-bottom: 40px;">
    <p>記事検索</p>
</div>

<div class="search-area">
    <form role="search" method="post" style="position: relative;">
        @csrf
        {!! $form['keyword'] !!}
        <input type="submit" id="searchsubmit" name="btnSearch" value="検索" style="position: absolute; top: 0px; right: 12rem; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border: 1px solid;">
        <input type="submit" id="searchsubmit" name="btnSearchClear" value="✖️" style="font-size: 23px; position: absolute; top: -3px; right: 15rem; background: none; border: none;">

    </form>
</div>
<!--/search-wrap-->


<ul id="gallery" class="gallery bgappearTrigger">
    @if( count($rows) )
    @foreach( $rows as $row )
    <li class="bgextend bgLRextendTrigger zoomInRotate">
        <div class="bgappearTrigger">
            <a href="{{route('member.post.detail', $row->id)}}" data-lightbox="gallery-group">
                @if (!empty($row->img))
                <img src="{{$row->img}}" style="object-fit: cover; width: 200px; height: 200px;">
                @else
                <img src="/images/blank_profile.png" style="object-fit: cover; width: 200px; height: 200px;">
                @endif
            </a>
            <p style="display: inline-block;">{{ $row->title }}<br>
                {{ $row->created_at }}<br>
                {{ $row->user->name }}さんの投稿
            </p>
            @if ($row->likedBy(Auth::user())->count() > 0)
            <a class="loved hide-text" data-remote="true" rel="nofollow" data-method="DELETE" href="/member/like/{{ $row->likedBy(Auth::user())->firstOrFail()->id }}"><i class="fas fa-heart" style="color: red; display: inline-block; padding-left: 10px;"></i></a>
            @else
            <a class="love hide-text" data-remote="true" rel="nofollow" data-method="POST" href="/member/post/{{ $row->id }}/likes"><i class="far fa-heart" style="display: inline-block; padding-left: 10px;"></i></a>
            @endif
        </div>
    </li>
    @endforeach
    @else
    <span>ヒットする記事がありません</span>
    @endif
</ul>

<!-- <div id="container" class="wrapper">
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
                        </div>
                        <div id="cars" class="area">
                            <ul>
                                <li><a href="#"><time datetime="2021-11-11">2021.11.11</time>インポートカーお披露目</a></li>
                                <li><a href="#"><time datetime="2021-06-07">2021.06.07</time>ドイツ・フランス車フェア</a></li>
                                <li><a href="#"><time datetime="2021-03-01">2021.03.01</time>買い替えをご検討中の方へ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
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
</div> -->

@endsection