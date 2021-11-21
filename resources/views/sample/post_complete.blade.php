@extends('layouts.member')

@section('content')
<main class="col-md-10 col-lg-10 offset-1 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$mode_name}}</h1>
</div>
<div class="row ms-1">
    {{$mode_name}}が完了しました<br/>
    <br/>
    <br/>
    <a href="{{$back}}" class="btn btn-primary">一覧に戻る</a>
</div>
</main>
@endsection