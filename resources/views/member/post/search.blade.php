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

<div class="top" style="margin: 0 0 40px;">
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
            <a href="{{route('member.post.detail_other', $row->id)}}" data-lightbox="gallery-group">
                @if (!empty($row->img))
                <img src="{{$row->img}}" style="object-fit: cover; width: 200px; height: 200px;">
                @else
                <img src="/images/blank_profile.png" style="object-fit: cover; width: 200px; height: 200px;">
                @endif
            </a>
            <p style="display: inline-block;">{{ $row->title }}<br>
                {{ $row->created_at }}<br>
                {{-- {{ $row->user->name }}さんの投稿 --}}
            </p>
            @if ($row->likedBy(Auth::user())->count() > 0)
            <a class="loved hide-text" data-remote="true" rel="nofollow" data-method="DELETE" href="/member/like/{{ $row->likedBy(Auth::user())->firstOrFail()->id }}"><i class="fas fa-heart" style="color: red; display: inline-block; padding-left: 10px;"></i></a>
            @else
            <a class="love hide-text" data-remote="true" rel="nofollow" data-method="POST" href="/member/post/{{ $row->id }}/likes"><i class="far fa-heart" style="display: inline-block; padding-left: 10px;"></i></a>
            @endif
        </div>
    </li>
    @endforeach
    {{$rows->links()}}
    @else
    <span>ヒットする記事がありません</span>
    @endif
</ul>

@endsection