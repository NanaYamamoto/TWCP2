@extends('layouts.member')

@section('content')

    <div class="top" style="margin-top: 40px;">
        <p>記事検索</p>
    </div>

        <!--タイムライン(ループ処理使う)-->
        <div id="contents" class="contents">
            <div id="main">
                <ul id="pic">

                @if (count($datas))
                        @foreach ($datas as $data)
                            @if (!is_null($data))
                                <li class="item">
                                    <img src="/images/画像/インテリア.png" alt="インテリア">
                                    <a href="{{ Route('member.archive.article', $data->post_id) }}">{{ $data->title }}</a>
                                    <p>{{ $data->updated_at }}</p>             
                                </li>      
                            @endif                               
                        @endforeach        
                @endif
                    
                </ul>
            </div>

        </div>




@endsection
