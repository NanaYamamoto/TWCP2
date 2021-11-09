@extends('sample.layout')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">メンバー管理 >> 編集</h1>
</div>
<div class="row">
    <form action="{{route('members.update.proc')}}" class="form-horizontal form-label-left" method="post">
        @csrf
        @include('operate.members.form')
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="{{route('members.update', $data->id)}}" class="btn btn-secondary">入力に戻る</a>
            <button class="btn btn-primary">登録する</button>
        </div>
    </form>
</div>
@endsection