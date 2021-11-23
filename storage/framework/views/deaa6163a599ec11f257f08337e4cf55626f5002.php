<?php $__env->startSection('contents'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-info-circle"></i> ユーザー管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('operate.admin.regist')); ?>" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>

<div class="row">
    <form action="<?php echo e(route('operate.admin.regist.confirm')); ?>" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="icon_url" class="col-sm-2 col-form-label">画像</label>
            <div class="col-sm-10">
                <?php if($form['icon_url']): ?>
                <p>
                <img src="<?php echo e($form->icon_url); ?>" width="100" height="100">
                    <!-- <img src="<?php echo e(asset('images/$form->icon_url')); ?>" width="100" height="100"> -->
                    
                </p>
                <?php else: ?>
                <img class="round-img" src="<?php echo e(asset('/images/blank_profile.png')); ?>" width="100" height="100">
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">氏名</label>
            <div class="col-sm-10">
                <?php echo $form['name']; ?>

                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span id="name-error" class="error invalid-feedback" style="display:block"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">メールアドレス</label>
            <div class="col-sm-10">
                <?php echo $form['email']; ?>

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span id="name-error" class="error invalid-feedback" style="display:block"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="<?php echo e(route('operate.admin')); ?>" class="btn btn-secondary">一覧に戻る</a>
        </div>
    </form>
</div>

<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
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
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/operate/administrator/detail.blade.php ENDPATH**/ ?>