@extends('layouts.newpost')

@section('newpost')
<!--記事作成-->

    <div class="top">
        <p>記事登録</p>
    </div>


    <form action="{{route('post.regist.proc')}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
        @csrf
        @include('admin.post.form')
        <div class="" style="margin:10px; display: flex;justify-content: center;align-items: center;">
            <a href="{{route('post.home')}}" class="btn btn-svg" style="margin:0px">
                <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                </svg>
                <span>一覧に戻る</span>
            </a>
            <button type="submit" class="btn btn-svg" >
                <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                </svg>
                <span>新規作成</span>
            </button>
        </div>
    </form>

    @endsection