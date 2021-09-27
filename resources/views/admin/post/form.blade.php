@php
$type = 1;
if( isset($data) ) $type = $data->type;
if( isset($form['type']) && !is_array( $form['type'] ) ) $type = $form['type'];
if( isset($form['type']) && $form['type'] == 'リンクのみ' ) $type = 2;
if( isset($form['type']) && $form['type'] == '通常のお知らせ' ) $type = 1;
@endphp


<div class="form-group row">
    <div class="col-sm-10">
    {!! $form['user_id'] !!}
    </div>
</div>

<div class="form-group row">
    <label for="category" class="col-sm-2 col-form-label">カテゴリー</label>
    <div class="col-sm-10">
        {!! $form['category'] !!}
@error('category')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>

<div class="form-group row" id="content"> <!-- divclassの中に入れる可能性あり @if( $type != 1 ) style="display:none;" @endif -->
    <label for="content" class="col-sm-2 col-form-label">内容</label>
    <div class="col-sm-10">
        {!! $form['content'] !!}
@error('content')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>

<div class="form-group row">
    <label for="publish" class="col-sm-2 col-form-label">公開フラグ</label>
    <div class="col-sm-10">
    @if( is_array( $form['publish']) )
        @foreach( $form['publish'] as $node ) {!! $node !!}@endforeach
    @else
        {!! $form['publish'] !!}
    @endif
@error('publish')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>

<div class="form-group row">
    <label for="img" class="col-sm-2 col-form-label">画像</label>
    <div class="col-sm-10">
        {!! $form['img'] !!}
        @error('img')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
    </div>
</div>


@section('scripts')
@parent
    <script lang="text/javascript">
        $( function(){
            if( $('input[name=type]:checked').val() == 2) {
                $('div[id=url]').show();
                $('div[id=content]').hide();
            }
            $('input[name=type]').change( function(){
                let val = $(this).val();
                if( val == 1 ) {
                    $('div[id=url]').hide();
                    $('div[id=content]').show();
                } else {
                    $('div[id=url]').show();
                    $('div[id=content]').hide();
                }
            } );
        } );
    </script>
@endsection