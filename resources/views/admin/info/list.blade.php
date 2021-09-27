@extends('sample.layout')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">お知らせ管</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{route('admin.information.regist')}}" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h6 class="card-title">検索条件</h6>
    </div>
    <form class="form-horizontal" method="post">
        <div class="card-body">
            @csrf
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">タイトル</label>
                <div class="col-sm-10">
                    {!! $form['title'] !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="publish" class="col-sm-2 col-form-label">公開フラグ</label>
                <div class="col-sm-4">
                    @foreach( $form['publish'] as $node ) {!! $node !!}@endforeach
                </div>
                <label for="type" class="col-sm-2 col-form-label">記事タイプ</label>
                <div class="col-sm-4">
                    @foreach( $form['type'] as $node ) {!! $node !!}@endforeach
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
                    <th>タイトル</th>
                    <th>記事日</th>
                    <th>公開フラグ</th>
                    <th>最終更新日時<br/>作成日時</th>
                    <th>操作</th>
                </tr>
@foreach( $rows as $row )
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->publish_at}}</td>
                    <td>{{$def['publish'][$row->publish] ?? '非公開'}} </td>
                    <td>{{$row->updated_at}}<br/>{{$row->created_at}}</td>
                    <td>
                        <a href="{{route('admin.information.detail', $row->id)}}" class="btn btn-outline-primary">詳細</a>
                        <a href="{{route('admin.information.update', $row->id)}}" class="btn btn-outline-primary">編集</a>
                        <a href="{{route('admin.information.delete.confirm', $row->id)}}" class="btn btn-outline-primary">削除</a>
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