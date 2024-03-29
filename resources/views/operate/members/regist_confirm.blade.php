@extends('sample.layout')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">お知らせ管理 >> 新規作成</h1>
</div>
<div class="row">
    <form action="{{route('operate.members.regist.proc')}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
        @csrf
        @include('operate.members.form')
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="{{route('operate.members.regist')}}" class="btn btn-secondary m-2">入力に戻る</a>
            <button class="btn btn-primary">登録する</button>
        </div>
    </form>
</div>
@endsection