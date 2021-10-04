@extends('layouts.team.team')




@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-list"></i> 投稿一覧</h1>
</div>

<div class="card">
                <div class="card-header">
                    <h6 class="card-title">検索条件</h6>
                </div>
                <form class="form-horizontal" method="post">
                    <div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">カテゴリー</label>
                            <div class="col-sm-10">
                                {!! $form['category'] !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">コンテンツ</label>
                            <div class="col-sm-10">
                                {!! $form['content'] !!}
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="publish" class="col-sm-2 col-form-label">公開フラグ</label>
                            <div class="col-sm-4">
                                @foreach( $form['publish'] as $node ) {!! $node !!}@endforeach
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info" name="btnSearch">上記の内容で検索</button>
                        <button type="submit" class="btn btn-outline-default" name="btnSearchClear">検索条件をクリア</button>
                    </div>
                </form>
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
                            <a href="https://www.dcs.co.jp/" target="_blank" rel="noopener" class="list-index__target" data-article-index-item-elem="link" data-fetch-link="true">
                                <figure class="list-index__image">
                                    <img width="890" height="650" src="/storage/members/{{$row->user->icon_url}}" class="attachment- size- wp-post-image" alt="" loading="lazy" data-article-index-item-elem="image"  sizes="(max-width: 890px) 100vw, 890px"> <span class="list-index__image-icon">
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
                            <div class="list-index__detail">
                                <a href="https://io3000.com/bm/dcs/" data-transition-type="overlay" data-article-index-item-elem="detail" class="list-index__detail-target" data-fetch-link="true">
                                    <svg width="20" height="20" viewBox="0 0 20 20" class="list-index__detail-icon" aria-label="Detail">
                                        <use xlink:href="#svg-icon-detail"></use>
                                    </svg>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    @else
                    <span>記事がありません</span>
                    @endif
                    </ul>
                    
                </div>
            </div>
        </div>
    </main>
</div>


            <div class="card" style="margin-top:10px;">
                <div class="card-header">
                    <h6 class="card-title">投稿一覧</h6>
                </div>
                <div class="card-body">
                    @if( count($rows) )
                    @foreach( $rows as $row )
                    <div class="row">
                        <div class="col-md mb-4">
                            <div class="card row-card">
                                <!-- このリンククリック範囲が親<div>全体まで広がる -->


                                <div class="card-body d-flex flex-row row">
                                    <div class="col-2 text-center">

                                        @if (!empty($row->user->icon_url))
                                        <img src="/storage/members/{{$row->user->icon_url}}" class="rounded-circle" style="object-fit: cover; width: 60px; height: 60px;">
                                        @else
                                        <img src="/images/blank_profile.png" class="rounded-circle" style="object-fit: cover; width: 60px; height: 60px;">
                                        @endif

                                    </div>
                                    <div class="col-7">
                                        <p class="mb-1">
                                            <!-- <a href="{{ route('post.profile', ['name' => $row->user->name]) }}" class="font-weight-bold user-name-link text-dark mr-4"> -->
                                                {{ $row->user->name }}
                                            <!-- </a> -->
                                            <span class="font-weight-lighter">{{ $row->created_at }}</span>
                                        </p>
                                        <div>
                                            {!! ($row->content) !!}
                                        </div>

                                    </div>



                                    @if( Auth::id() === $row->user_id )
                                    <!-- dropdown -->
                                    <div class="col-1 card-text">
                                        <div class="dropdown text-center">
                                            <a class="in-link p-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-lg"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('post.update', $row->id) }}">
                                                    <i class="fas fa-pen mr-1"></i>投稿を編集する
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="{{ route('post.delete.proc', $row->id) }}">
                                                    <i class="fas fa-trash-alt mr-1"></i>投稿を削除する
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- dropdown -->
                                    @endif
                                </div>


                                <div class="card-footer py-1 d-flex justify-content-end bg-white">

                                    <!-- いいねアイコン -->
                                    <div class="d-flex align-items-center">
                                        <i class="far fa-heart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <span>データがありません</span>
                    @endif
                </div>
            </div>
            @endsection