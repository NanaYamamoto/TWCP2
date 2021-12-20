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
                                        <div style="display: flex;">
                                            <h1 style="font-size: 18px;">{{ $data->category->name }}</h1>
                                            <a href="{{ Route('member.archive.category', $data->category_id) }}">
                                                <span class="category" href="#">1件</span>
                                            </a>  
                                        </div>
                                    
                                        @if (!empty($data->img))                                       
                                                <img src="{{ $data->img }}" style="object-fit: cover;">  
                                        @else   <img src="/images/画像/nologo.png">                                    
                                        @endif
                                        
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