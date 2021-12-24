@extends('sample.layout')

@section('contents')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">お知らせ管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{route('operate.category')}}" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>

<div class="row">
    <form action="{{route('operate.category.regist.confirm')}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                {!! $form['id'] !!}
                @error('$category->id')
                <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">カテゴリー名</label>
            <div class="col-sm-10">
                {!! $form['name'] !!}
                @error('$category->name')
                <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="Public flag" class="col-sm-2 col-form-label">公開フラグ</label>
            <div class="col-sm-10">
                {!! $form['active'] !!}
                @error('email')
                <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="icon_url" class="col-sm-2 col-form-label">カテゴリー画像</label>
            <div class="col-sm-10">
                @if ($form['img'])
                <p>
                    <img src="{{ asset('images/$form->img')}}" width="100" height="100">
                </p>
                @else
                <img class="round-img" src="{{ asset('/images/blank_profile.png') }}" width="100" height="100">
                @endif
            </div>
        </div>

        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="{{route('operate.category')}}" class="btn btn-secondary">一覧に戻る</a>
        </div>
    </form>
</div>
<!--
<div class="row">
    @include('operate.category.form')
    <div class="form-group form-inline" style="margin-top:10px;">
        <a href="{{route('operate.category')}}" class="btn btn-secondary">一覧に戻る</a>
    </div>
</div>
-->
@endsection
