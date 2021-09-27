@extends('sample.layout')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$mode_name}}完了</h1>
</div>
<div class="row">
    <div>{{$mode_name}}が完了しました<br/></div>
    <br/>
    <br/>
    <a href="{{$back}}" class="btn btn-primary">一覧に戻る</a>
</div>
@endsection