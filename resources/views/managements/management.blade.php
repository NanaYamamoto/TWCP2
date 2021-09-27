@extends('layouts/managements')

<!-- ローディング画面表示 消した方がいいかも… -->
<div id="loadingScreen" class="loading">
    <div class="loading__animation-box">
        <p>Now loading...</p><!-- 1 -->
        <span></span><!-- 2 -->
        <span></span><!-- 3 -->
        <span></span><!-- 4 -->
    </div>
</div>

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center bg-light pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">管理ページ</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a class='ml-auto mr-2' href='management/create'><i class="fas fa-plus-circle"></i></a>
        </div>

    </div>
</div>

@foreach($messages as $message)
<div class="card-header d-flex justify-content-between">
    <a href="management/edit/{{ $message['id'] }}" class="d-flex">{{ $message['message'] }}</a>
    <div class="d-flex">
        <a href="management/edit/{{ $message['id'] }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill mr-2" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
            </svg></a>
        <form method="post" action="management/delete/{{ $message['id'] }}" id='delete-form'>
            @csrf
            <button class="p-0 mr-2" style='border: none;'><i id='delete-button' class="fa fa-trash"></i></button>
        </form>
    </div>
</div>
@endforeach
</div>
<div class="my-4 w-100" id="myChart" width="900" height="450"></div>
@endsection