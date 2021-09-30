@extends('team.team')




@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-list"></i> 投稿一覧</h1>

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
        <h6 class="card-title">投稿一覧</h6>
    </div>
    <div class="dard-body">
        @if( count($rows) )
        <div class="row">
            <div class="col-md mb-4">
                <div class="card row-card">
                    <!-- このリンククリック範囲が親<div>全体まで広がる -->

                    @foreach( $rows as $row )
                    <div class="card-body d-flex flex-row row">
                        <div class="col-2 text-center">
                            <a href="{{ route('post.profile', ['name' => $row->user->name]) }}" class="in-link text-dark">
                                <img class="user-icon rounded-circle" src="{{ $row->user->icon_url }}" style="width: 50px; height: 50px;">
                            </a>
                        </div>
                        <div class="col-7">
                            <p class="mb-1">
                                <a href="{{ route('post.profile', ['name' => $row->user->name]) }}" class="font-weight-bold user-name-link text-dark mr-4">
                                    {{ $row->user->name }}
                                </a>
                                <span class="font-weight-lighter">{{ $row->created_at }}</span>
                            </p>

                        </div>



                        @if( Auth::id() === $row->user_id )
                        <!-- dropdown -->
                        <div class="col-1 card-text">
                            <div class="dropdown text-center">
                                <a class="in-link p-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-lg"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('post.update', $row->id) }}">
                                        <i class="fas fa-pen mr-1"></i>投稿を編集する
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('post.delete.proc', $row->id) }}">
                                        <i class="fas fa-trash-alt mr-1"></i>投稿を削除する
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- dropdown -->



                        @endif

                    </div>

                    <div class="card-body pt-0">
                        <div class="px-3">
                            {!! ($row->content) !!}
                        </div>

                    </div>
                    <div class="card-footer py-1 d-flex justify-content-end bg-white">

                        <!-- いいねアイコン -->
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <span>データがありません</span>
        @endif
    </div>
</div>
@endsection