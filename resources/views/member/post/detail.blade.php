@extends('layouts.member')

@section('title')
新規記事作成
@endsection

@section('content')
<div class="top">
        <p>記事詳細</p>
    </div>

    <form class="form-horizontal form-label-left" enctype="multipart/form-data">
        @include('member.post.form')
        <div class="" style="margin:10px; display: flex;justify-content: center;align-items: center;">
            <a href="{{route('member.mypage')}}" class="btn btn-svg" style="margin:0px">
                <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                </svg>
                <span>一覧に戻る</span>
            </a>
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
        </div>
    </form>
@endsection