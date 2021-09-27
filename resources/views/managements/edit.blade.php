@extends('layouts.managements')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center bg-light pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">メッセージ編集</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="/management"><button type="button" class="btn btn-sm btn-outline-secondary">戻る</button></a>
            
        </div>

    </div>
</div>
<div class="my-4 w-100" id="myChart" width="900" height="450">
    <form action="{{ route('update', ['id' => $message['id'] ] ) }}" method="post">
        @csrf
        <input type="hidden" name='user_id' value="{{ $user['id'] }}">
        <div class="form-group">
            <textarea class="form-control" name="message" cols="30" rows="10">{{ $message['message'] }}</textarea>
        </div>
        <div class="form-group">
            <label id="tag_id">タグ</label>
            <select class='form-control' name='tag_id' id="tag_id">
                @foreach($tags as $tag)
                <option value="{{ $tag['id'] }}" {{ $tag['id'] == $message['tag_id'] ? "selected" : "" }}>{{$tag['name']}}</option>
                <!-- $tag['id']と$message['tag_id']が一緒ならば最初から選択(selected)、なければ何も表示しない -->
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">更新</button>
    </form>
</div>
@endsection