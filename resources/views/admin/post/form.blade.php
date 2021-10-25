<div id="contents" class="cp_iptxt">
    {!! $form['title'] !!}
    @error('title')
    <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
    @enderror
    <label for="title" class="">タイトル</label>
    <span class="focus_line"></span>
</div>
<div id="contents" class="cp_iptxt">
    <label for="category_id" class="padding">カテゴリー</label>
    {!! $form['category_id'] !!}
    @error('category_id')
    <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
    @enderror
    <!--この部分だけ赤線を排除-->
    <span class="focus_line-z"></span>
</div>

<div id="contents" class="cp_iptxt">
    <label for="content" class="d-flex">記事内容</label>
    {!! $form['content'] !!}
    @error('content')
    <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
    @enderror
    <span class="focus_line"></span>
</div>

<div id="contents" class="cp_iptxt">
    <label for="publish" class="padding">公開フラグ</label>

    @if( is_array( $form['publish']) )
    @foreach( $form['publish'] as $node ) {!! $node !!}@endforeach
    @else
    {!! $form['publish'] !!}
    @endif
    @error('publish')
    <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
    @enderror

    <span class="focus_line"></span>
</div>

<div id="contents" class="cp_iptxt">
    <label for="img" class="">画像</label>
    {!! $form['img'] !!}
    @error('img')
    <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
    @enderror

</div>




@section('scripts')
@parent
<script lang="text/javascript">
    $(function() {
        if ($('input[name=type]:checked').val() == 2) {
            $('div[id=url]').show();
            $('div[id=content]').hide();
        }
        $('input[name=type]').change(function() {
            let val = $(this).val();
            if (val == 1) {
                $('div[id=url]').hide();
                $('div[id=content]').show();
            } else {
                $('div[id=url]').show();
                $('div[id=content]').hide();
            }
        });
    });
</script>
@endsection