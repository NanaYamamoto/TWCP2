
@php
$type = 1;
if( isset($data) ) $type = $data->type;
if( isset($form['type']) && !is_array( $form['type'] ) ) $type = $form['type'];
if( isset($form['type']) && $form['type'] == '公開' ) $type = 2;
if( isset($form['type']) && $form['type'] == '非公開' ) $type = 1;
@endphp

{{--
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-10">
        {!! $form['id'] !!}
@error('id')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>
--}}


<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">名前</label>
    <div class="col-sm-10">
        {!! $form['name'] !!}
@error('name')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>

<div class="form-group row">
    <label for="publish" class="col-sm-2 col-form-label">公開フラグ</label>
    <div class="col-sm-10">
    @if( is_array( $form['active']) )
        @foreach( $form['active'] as $node ) {!! $node !!}@endforeach
    @else
        {!! $form['active'] !!}
    @endif
@error('active')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>

<div class="form-group row">
    <label for="img" class="col-sm-2 col-form-label">カテゴリー画像</label>
    <div class="col-sm-10">
        {!! $form['img'] !!}
        @error('img')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
    </div>
</div>
{{--
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">更新日時</label>
    <div class="col-sm-10">
        {!! $form['updated_at'] !!}
@error('updated_at')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>


<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">作成日時</label>
    <div class="col-sm-10">
        {!! $form['created_at'] !!}
@error('created_at')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>


<div class="form-group row">
    <label for="publish_at" class="col-sm-2 col-form-label">記事日付</label>
    <div class="col-sm-10">
        {!! $form['publish_at'] !!}
@error('publish_at')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>

<div class="form-group row">
    <label for="type" class="col-sm-2 col-form-label">タイプ</label>
    <div class="col-sm-10">
    @if( is_array($form['type']))
        @foreach( $form['type'] as $node ) {!! $node !!}@endforeach
    @else
        {!! $form['type'] !!}
    @endif
@error('type')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>

<div class="form-group row" id="url" @if( $type != 2 ) style="display:none;"@endif >
    <label for="url" class="col-sm-2 col-form-label">URL</label>
    <div class="col-sm-10">
        {!! $form['url'] !!}
@error('url')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>

<div class="form-group row" id="content" @if( $type != 1 ) style="display:none;" @endif >
    <label for="title" class="col-sm-2 col-form-label">内容</label>
    <div class="col-sm-10">
        {!! $form['content'] !!}
@error('content')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
@enderror
    </div>
</div>
--}}

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