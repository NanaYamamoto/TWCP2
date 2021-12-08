<!-- <?php $__env->startSection('css'); ?> -->

<?php $__env->startSection('title'); ?>
マイページ
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="profile-edit-form" class="container" style="grid-template-columns:none;">

    <div class="row">
        <div class="bg-white">
            <!-- col-10 -->

            <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">マイページ</div>


            
            <span class="icon_url-form image-picker">
                <div class="form-group mt-5 text-center">
                <img src="/storage/members/<?php echo e($user->icon_url); ?>" class="rounded-circle" style="object-fit: cover; width: 120px; height: 120px;">
                </div>
            </span>

            
            <div class="form-group mt-4">
                <div class="text-center" style="font-size: 1.5rem; font-weight: bold;"><?php echo e($user->name); ?></div>
            </div>

            
            <div class="form-group mt-4">
                <div class="text-center"><?php echo e($db); ?>件投稿しています</div>
            </div>

            <div class="form-group mb-0 mt-4 text-center">
                <a href="<?php echo e(route('member.post.profile_edit')); ?>">
                    <button class="btn btn-block btn-primary">
                        プロフィールを編集する
                    </button>
                </a>
            </div>
            <div class="form-group mb-0 mt-3 text-center">
                <a href="<?php echo e(route('member.mypage')); ?>" class="btn btn-block btn-secondary mt-2" style="padding: 5px 45px;">投稿一覧に戻る</a>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/member/post/profile.blade.php ENDPATH**/ ?>