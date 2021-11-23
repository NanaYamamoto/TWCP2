@extends('sample.layout')

@section('contents')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">カテゴリー管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{route('category.regist')}}" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>公開フラグ</th>
            <th>写真</th>
            <th>作成日時</th>
            <th>更新日時</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">

        @foreach ($categorie as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->active }}</td>
                <td>{{ $category->img }}</td>
                <td>{{ date('Y.m.d',strtotime($category->created_at)) }}</td>
                <td>{{ date('Y.m.d',strtotime($category->updated_at)) }}</td>
                <td class="text-nowrap">
                    <p><a href="{{ route('category.details', [$category->id] ) }}" class="btn btn-primary btn-sm">詳細</a></p>
                    <p><a href="{{ route('category.update.confirm', [$category->id] ) }}" class="btn btn-info btn-sm">編集</a></p>
                    <p><a href="{{ route('category.delete.confirm', [$category->id] ) }}" class="btn btn-danger btn-sm">削除</a></p>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>

{{-- @include('layouts.categoryfooter') --}}


@endsection