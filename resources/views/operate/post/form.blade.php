
<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">タイトル</label>
    <div class="col-sm-10">
        {!! $form['title'] !!}
        @error('title')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="category_id" class="col-sm-2 col-form-label">カテゴリー</label>
    <div class="col-sm-10">
        {!! $form->category->name !!}
        @error('category_id')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
    </div>
</div>

<div class="form-group row">
<label for="content" class="col-sm-2 col-form-label">本文</label>
    <div class="col-sm-10">
        {!! $form['content'] !!}
        @error('content')
        <span id="name-error" class="error invalid-feedback" style="display:block">{{$message}}</span>
        @enderror
    </div>
    <!-- <div class="col-auto offset-2">
        <span id="passwordHelpInline" class="form-text">
            8文字以上20文字以内で入力してください
        </span>
    </div> -->
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