@extends('layouts.member')

@section('css')
<link href="{{ asset('css/toppage.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="top" style="margin-top: 40px;">
        <p>記事検索</p>
    </div>

        <!--タイムライン(ループ処理使う)-->

        <section id="contents">
            <div id="contents" class="contents">
                <div id="main">
                    <ul id="pic">

                        @if (count($datas))
                            @foreach ($datas as $data)
                                @if (!is_null($data))
                                    <li class="item">
                                    <h1>{{ $data->title }} </h1>
                                    <h1>{{ $data->content }} </h1>
                                      
                                    <img src="img/画像/インテリア.png" alt="インテリア">
    
                                        <span class="category" href="#">1件</span>
                                        <figure>
                                            <a target="_blank" href="#" title="インテリア">
            
                                            </a>
                                        </figure>
                                    </li>      
                                @endif                               
                            @endforeach        
                        @endif
                        
                    </ul>
                </div>
            </div>
        </section> 


    

@endsection


    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
    <!--IE11用-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <!--不必要なら削除してください-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
    <!--不必要なら削除してください-->

    <!-- モーダルウィンドウ用 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
    <!--JSを読み込み-->
    <script src="{{ asset('js/team.js') }}"></script>

</body>

</html>


