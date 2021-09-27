@extends('layouts/managements')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center bg-light pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">メッセージ</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="/management"><button type="button" class="btn btn-sm btn-outline-secondary">戻る</button></a>
            
        </div>
        
    </div>
</div>
<div class="my-4 w-100" id="myChart" width="900" height="450">
    <form action="{{ route('store') }}" method="post">
        @csrf
        <input type="hidden" name='user_id' value="{{ $user['id'] }}">
        <div class="form-group">
            <textarea class="form-control" name="message" cols="30" rows="10" placeholder="なんでも入力して下さい"></textarea>
        </div>
        <div class="form-group">
            <label id="tag">タグ</label>
            <input type="text" id="tag" name="tag" class="form-control" placeholder="タグを入力して下さい"></input>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">保存</button>
    </form>
</div>
@endsection