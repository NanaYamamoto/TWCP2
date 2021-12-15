@extends('sample.layout')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-user-lock"></i> 記事管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title">
            <i class="fas fa-search mr-2"></i>検索条件
        </div>
    </div>
    <form class="form-horizontal" method="post">
        <div class="card-body">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">キーワード</label>
                <div class="col">
                    {!! $form['keyword'] !!}
                </div>
                <label for="category" class="col-sm-2 col-form-label">カテゴリ</label>
                <div class="col">
                    {!! $form['category'] !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">投稿日</label>
                <div class="col-sm-10 form-inline">
                    {!! $form['begin_at'] !!}&nbsp;～&nbsp;{!! $form['end_at'] !!}
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
                    <th width="100">ID</th>
                    <th style="max-width:400px;min-width:200px;">タイトル</th>
                    <th width="200">カテゴリ</th>
                    <th style="max-width:400px;min-width:200px;">本文</th>
                    <th width="200">最終更新日時<br />作成日時</th>
                    <th width="150">操作</th>
                </tr>
                @foreach( $rows as $row )
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->category->name}}</td>
                    <td>{{Str::limit($row->content, 30 * 3, '...' )}}</td>
                    <td>{{$row->updated_at}}<br />{{$row->created_at}}</td>
                    <td>
                        <a href="{{route('operate.admin.delete.confirm', $row->id)}}" class="btn btn-outline-primary">削除</a>
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