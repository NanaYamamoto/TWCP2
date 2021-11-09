@extends('layouts.admin')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-user-plus"></i> 新規作成</h1>
</div>
<div class="row">
    <form action="{{route('admin.regist.confirm')}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
        @csrf
        @include('operate.administrator.form')
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="{{route('admin')}}" class="btn btn-secondary mr-2">キャンセル</a>
            <button class="btn btn-primary">確認画面へ</button>
        </div>
    </form>
</div>
@endsection