@extends('layouts.post')




@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-user-lock"></i> ユーザー管理</h1>

</div>
<div class="card">
    <div class="card-header">
        <h6 class="card-title">検索条件</h6>
    </div>
    <form class="form-horizontal" method="post">
        <div class="card-body">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">名前</label>
                <div class="col-sm-10">
                    {!! $form['name'] !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">カテゴリー</label>
                <div class="col-sm-10">
                    {!! $form['category'] !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">コンテンツ</label>
                <div class="col-sm-10">
                    {!! $form['content'] !!}
                </div>
            </div>

            <div class="form-group row">

                <label for="publish" class="col-sm-2 col-form-label">公開フラグ</label>
                <div class="col-sm-4">
                    @foreach( $form['publish'] as $node ) {!! $node !!}@endforeach
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info" name="btnSearch">上記の内容で検索</button>
            <button type="submit" class="btn btn-outline-default" name="btnSearchClear">検索条件をクリア</button>
        </div>
    </form>
</div>

<div class="card" style="margin-top:10px;">
    <div class="card-header">
        <h6 class="card-title">データ一覧</h6>
    </div>
    <div class="dard-body">
        @if( count($rows) )
        <table class="table table-bordered table-hover dataTable dtr-inline" role="grid">
            <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>名前</th>
                    <th>カテゴリー</th>
                    <th>本文</th>
                    <th>最終更新日時<br />作成日時</th>
                    <th>操作</th>
                </tr>
                @foreach( $rows as $row )
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->user->name}}</td>
                    <td>{{$row->category}}</td>
                    <td>{{$row->content}}</td>
                    <td>{{$row->updated_at}}<br />{{$row->created_at}}</td>
                    <td>
                        <a href="{{route('post.detail', $row->id)}}" class="btn btn-outline-primary">詳細</a>
                        <a href="{{route('post.update', $row->id)}}" class="btn btn-outline-primary">編集</a>
                        <a href="{{route('post.delete.proc', $row->id)}}" class="btn btn-outline-primary">削除</a>
                    </td>
                </tr>
                @endforeach
            </thead>
        </table>
        {{$rows->links()}}
        @else
        <span>データがありません</span>
        @endif
    </div>
</div>
@endsection