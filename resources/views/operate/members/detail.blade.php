@extends('sample.layout')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">メンバー管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{route('operate.members.regist')}}" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>

<div class="row">
    <form action="{{route('operate.members.regist.confirm')}}" class="form-horizontal form-label-left" method="post">
        @include('operate.members.form')
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="{{route('operate.members')}}" class="btn btn-secondary">一覧に戻る</a>
        </div>
    </form>
</div>
@endsection