@extends('layouts.member')

@section('content')

<div class="top" style="margin-bottom: 40px;">
    <p>アーカイブ</p>
</div>

            
    <!--タイムライン(ループ処理使う)-->
        <div id="contents" class="contents">
                <div id="main">
                    <ul id="pic">

                    @if (count($datas))
                            @foreach ($datas as $data)
                                @if (!is_null($data))
                                    <li class="item">

                                    <h1>{{ $data->category_id }}</h1>
                                    <a href="{{ Route('member.archive.category', $data->category_id) }}">
                                        <span class="category" href="#">1件</span>
                                    </a>  
                                    {{-- {{ $data->img }} --}}
                                    {{-- <i class="far fa-image"></i> --}}
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