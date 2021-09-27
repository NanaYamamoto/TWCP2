@extends('sample.layout')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">お知らせ管理 >> 新規作成</h1>
</div>
<div class="row">
    <form action="{{route('admin.information.regist.proc')}}" class="form-horizontal form-label-left" method="post">
        @csrf
        @include('admin.info.form')
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="{{route('admin.information.regist')}}" class="btn btn-secondary">入力に戻る</a>
            <button class="btn btn-primary">確認画面へ</button>
        </div>
    </form>
</div>
@endsection
