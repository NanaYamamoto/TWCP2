@extends('sample.layout')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-user-minus"></i> 削除</h1>
</div>
<div class="row">
    <form action="{{route('operate.post.delete.proc')}}" class="form-horizontal form-label-left" method="post">
        @csrf
        @include('operate.post.form')
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="{{route('operate.post')}}" class="btn btn-secondary mr-2">キャンセル</a>
            <button class="btn btn-primary">削除処理</button>
        </div>
    </form>
</div>
@endsection