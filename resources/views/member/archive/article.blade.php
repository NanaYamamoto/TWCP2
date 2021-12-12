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
        {{-- {!! $form['title'] !!} --}}
        {{ $post->title }}
        @error('title')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
        <span class="focus_line"></span>
    </div>
    <div id="contents" class="cp_iptxt">
        <label for="category_id" class="d-flex">カテゴリー</label>
        {{-- {!! $form['category_id'] !!} --}}
        {{ $post->category_id }}
        @error('category_id')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
        <!--この部分だけ赤線を排除-->
        <span class="focus_line-z"></span>
    </div>

    <div id="contents" class="cp_iptxt">
        <label for="content" class="d-flex">記事内容</label>
        <!--画像あったら表示-->
        @if (!empty($post->img))
            <div>
                <img src="{{ $post->img }}" style="object-fit: cover; width: 400px; height: 400px;">
            </div>
        @endif
        {{ $post->content }}
        @error('content')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
        <span class="focus_line"></span>
    </div>

    <div class="" style="margin:10px; display: flex;justify-content: center;align-items: center;">
        <a href="{{route('member.archive')}}" class="btn btn-svg" style="margin:0px">
            <svg>
                <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
            </svg>
            <span>一覧に戻る</span>
        </a>
        {{-- @auth
        <a href="{{route('member.post.update', $form['id'])}}" class="btn btn-svg" style="margin:0px">
            <svg>
                <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
            </svg>
            <span>編集</span>
        </a> 
        <a href="{{route('member.post.delete.proc', $form['id'])}}" class="btn btn-svg" style="margin:0px">
            <svg>
                <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
            </svg>
            <span>削除</span>
        </a>
        @else
        @endauth --}}
    </div>
</form>
@endsection