@extends('layouts.team.team2')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">投稿詳細</h1>
</div>

<div class="row">
    <!-- <form action="{{route('post.regist')}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data"> -->
        @include('admin.post.form')
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="{{route('post.home')}}" class="btn btn-secondary">一覧に戻る</a>
        </div>
    <!-- </form> -->
</div>
@endsection