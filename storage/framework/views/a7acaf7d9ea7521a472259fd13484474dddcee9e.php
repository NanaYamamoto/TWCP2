<!-- <?php $__env->startSection('css'); ?> -->

<?php $__env->startSection('title'); ?>
プロフィール編集
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="profile-edit-form" class="container" style="grid-template-columns:none;">

    <div class="row">
        <div class="bg-white"><!-- col-10 -->

            <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">プロフィール編集</div>

            <form method="POST" action="<?php echo e(route('member.post.profile_proc')); ?>" class="p-5" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>


                
                <span class="icon_url-form image-picker">
                    <input type="file" name="icon_url" class="d-none" accept="image/png,image/jpeg,image/gif" id="icon_url" />
                    <label for="icon_url" class="d-inline-block">
                        <?php if(!empty($user->icon_url)): ?>
                        <img src="/storage/members/<?php echo e($user->icon_url); ?>" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
                        <?php else: ?>
                        <img src="/images/blank_profile.png" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
                        <?php endif; ?>
                    </label>
                </span>

                
                <div class="form-group mt-3">
                    <label for="name" style="letter-spacing: 5.5px;">ニックネーム</label>
                    <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name', $user->name)); ?>" required autocomplete="name" autofocus>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group mb-0 mt-4 text-center">
                    <button type="submit" class="btn btn-block btn-primary" style="padding: 6px 37px;">
                        保存
                    </button>
                </div>
                <div class="form-group mb-0 mt-3 text-center">
                    <a href="<?php echo e(route('member.post.profile')); ?>" class="btn btn-block btn-secondary mt-2">プロフィール画面に戻る</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/member/post/profile_edit.blade.php ENDPATH**/ ?>