@extends('sample.layout')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">ユーザー管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{route('admin.information.regist')}}" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>

<div class="row">
    <form action="{{route('admin.information.regist.confirm')}}" class="form-horizontal form-label-left" method="post">
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
    </form>
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
@endsection