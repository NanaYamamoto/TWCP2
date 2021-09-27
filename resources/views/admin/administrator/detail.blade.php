@extends('layouts.admin')

@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-info-circle"></i> ユーザー管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{route('operate.user.regist')}}" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>

<div class="row">
    <form action="{{route('operate.user.regist.confirm')}}" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="icon_url" class="col-sm-2 col-form-label">画像</label>
            <div class="col-sm-10">
                @if ($form['icon_url'])
                <p>
                <img src="{{$form->icon_url}}" width="100" height="100">
                    <!-- <img src="{{ asset('images/$form->icon_url')}}" width="100" height="100"> -->
                    
                </p>
                @else
                <img class="round-img" src="{{ asset('/images/blank_profile.png') }}" width="100" height="100">
                @endif
            </div>
        </div>

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

        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="{{route('operate.user')}}" class="btn btn-secondary">一覧に戻る</a>
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