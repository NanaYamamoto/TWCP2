@extends('sample.layout')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">カテゴリー管理 >> 削除</h1>
</div>
<div class="row">
    <form action="{{route('operate.category.delete.proc')}}" class="form-horizontal form-label-left" method="post">
        @csrf
        @include('operate.category.form')
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="{{route('operate.category')}}" class="btn btn-secondary">キャンセル</a>
            <button class="btn btn-primary">削除処理</button>
        </div>
    </form>
</div>
@endsection