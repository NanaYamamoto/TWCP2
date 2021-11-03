@php
$type = 1;
if( isset($data) ) $type = $data->type;
if( isset($form['type']) && !is_array( $form['type'] ) ) $type = $form['type'];
if( isset($form['type']) && $form['type'] == '管理者' ) $type = 2;
if( isset($form['type']) && $form['type'] == '一般会員' ) $type = 1;
@endphp

<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">氏名</label>
    <div class="col-sm-10">
        {!! $form['name'] !!}
        @error('name')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">メールアドレス</label>
    <div class="col-sm-10">
        {!! $form['email'] !!}
        @error('email')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">パスワード</label>
    <div class="col-sm-10">
        {!! $form['password'] !!}
        @error('password')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
    </div>
    <!-- <div class="col-auto offset-2">
        <span id="passwordHelpInline" class="form-text">
            8文字以上20文字以内で入力してください
        </span>
    </div> -->
</div>

<div class="form-group row">
    <label for="icon_url" class="col-sm-2 col-form-label">画像</label>
    <div class="col-sm-10">
        {!! $form['icon_url'] !!}
        @error('icon_url')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
    </div>
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