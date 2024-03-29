@extends('layouts.member')

<!-- @section('css') -->

@section('title')
マイページ
@endsection

@section('content')
<div id="profile-edit-form" class="container" style="grid-template-columns:none;">

    <div class="row">
        <div class="bg-white">
            <!-- col-10 -->

            <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">マイページ</div>


            {{-- アバター画像 --}}
            <span class="icon_url-form image-picker">
                <div class="form-group mt-5 text-center">
                    <img src="/storage/members/{{$user->icon_url}}" class="rounded-circle" style="object-fit: cover; width: 120px; height: 120px;">
                </div>
            </span>

            {{-- ニックネーム --}}
            <div class="form-group mt-4">
                <div class="text-center" style="font-size: 1.5rem; font-weight: bold;">{{ $user->name }}</div>
            </div>

            {{-- 投稿数 --}}
            <div class="form-group mt-4">
                <div class="text-center">{{ $db }}件投稿しています</div>
            </div>
            <div class="form-group mt-4">
                <div class="text-center">{{ $arcive }}件の投稿をアーカイブしています</div>
            </div>

            <div class="form-group mt-4 text-center">
                <a href="{{ route('member.archive') }}" class="btn btn-block btn-primary" style="background-color: rgb(56 159 9); border-color: rgb(56 159 9);">
                    アーカイブページに移動する
                </a>
            </div>
            <div class="form-group mb-0 mt-2 text-center">
                <a href="{{ route('member.post.profile_edit') }}" class="btn btn-block btn-primary" style="padding: .375rem 1.8rem;">
                    プロフィールを編集する
                </a>
            </div>
            <div class="form-group mb-0 mt-2 text-center">
                <a href="{{route('member.mypage')}}" class="btn btn-block btn-secondary" style="padding: .375rem 4.0rem;">投稿一覧に戻る</a>
            </div>

        </div>
    </div>
</div>
@endsection