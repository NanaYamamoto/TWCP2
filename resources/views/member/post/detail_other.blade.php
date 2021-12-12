@extends('layouts.member')

@section('title')
新規記事作成
@endsection

@section('content')
<div class="top">
    <p>記事詳細</p>
</div>

<form class="form-horizontal form-label-left" enctype="multipart/form-data">
    <div id="contents" class="cp_iptxt">
        <label for="title" class="d-flex">タイトル</label>
        {!! $form['title'] !!}
        @error('title')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
        <span class="focus_line"></span>
    </div>
    <div id="contents" class="cp_iptxt">
        <label for="category_id" class="d-flex">カテゴリー</label>
        {!! $form['category_id'] !!}
        @error('category_id')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
        <!--この部分だけ赤線を排除-->
        <span class="focus_line-z"></span>
    </div>

    <div id="contents" class="cp_iptxt">
        <label for="content" class="d-flex">記事内容</label>
        {!! $form['content'] !!}
        @error('content')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
        <span class="focus_line"></span>
    </div>

    @if( count($rows) )
    @foreach( $rows as $row )
    <div id="contents" class="cp_iptxt">
        <label for="img" class="d-flex">画像</label>
        @if (!empty($row->img))
        <img src="{{$row->img}}" style="object-fit: cover; width: 1000px; height: 1000px;">
        @else
        <img src="/images/blank_profile.png" style="object-fit: cover; width: 1000px; height: 1000px;">
        @endif
    </div>
    @endforeach
    @endif
    <div class="" style="margin:10px; display: flex;justify-content: center;align-items: center;">
        <a href="{{route('member.post.search')}}" class="btn btn-svg" style="margin:0px">
            <svg>
                <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
            </svg>
            <span>一覧に戻る</span>
        </a>
        
    </div>
</form>
@endsection