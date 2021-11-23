@extends('layouts.admin')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">メンバー管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{route('admin.regist')}}" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>

<div class="row">
    @include('operate.administrator.form')
    <div class="form-group form-inline" style="margin-top:10px;">
        <a href="{{route('admin')}}" class="btn btn-secondary">一覧に戻る</a>
    </div>
    </form>
</div>
@endsection