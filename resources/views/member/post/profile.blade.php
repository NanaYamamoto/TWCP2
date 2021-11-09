@extends('layouts.member')

<!-- @section('css') -->

@section('title')
プロフィール編集
@endsection

@section('content')
<div id="profile-edit-form" class="container" style="grid-template-columns:none;">

    <div class="row">
        <div class="bg-white"><!-- col-10 -->

            <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">プロフィール編集</div>

            <form method="POST" action="{{ route('post.editProfile') }}" class="p-5" enctype="multipart/form-data">
                @csrf


                {{-- アバター画像 --}}
                <span class="icon_url-form image-picker">
                    <input type="file" name="icon_url" class="d-none" accept="image/png,image/jpeg,image/gif" id="icon_url" />
                    <label for="icon_url" class="d-inline-block">
                        @if (!empty($user->icon_url))
                        <img src="/storage/members/{{$user->icon_url}}" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
                        @else
                        <img src="/images/blank_profile.png" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
                        @endif
                    </label>
                </span>

                {{-- ニックネーム --}}
                <div class="form-group mt-3">
                    <label for="name" style="letter-spacing: 5.5px;">ニックネーム</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-0 mt-4 text-center">
                    <button type="submit" class="btn btn-block btn-primary" style="padding: 6px 37px;">
                        保存
                    </button>
                </div>
                <div class="form-group mb-0 mt-3 text-center">
                    <a href="{{route('post.home')}}" class="btn btn-block btn-secondary mt-2">一覧に戻る</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection