<?php $__env->startSection('contents'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">お知らせ管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('category')); ?>" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>

<div class="row">
    <form action="<?php echo e(route('category.regist.confirm')); ?>" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <?php echo $form['id']; ?>

                <?php $__errorArgs = ['$category->id'];
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
            <label for="name" class="col-sm-2 col-form-label">カテゴリー名</label>
            <div class="col-sm-10">
                <?php echo $form['name']; ?>

                <?php $__errorArgs = ['$category->name'];
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
            <label for="Public flag" class="col-sm-2 col-form-label">公開フラグ</label>
            <div class="col-sm-10">
                <?php echo $form['active']; ?>

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

        <div class="form-group row">
            <label for="icon_url" class="col-sm-2 col-form-label">カテゴリー画像</label>
            <div class="col-sm-10">
                <?php if($form['img']): ?>
                <p>
                    <img src="<?php echo e(asset('images/$form->img')); ?>" width="100" height="100">
                </p>
                <?php else: ?>
                <img class="round-img" src="<?php echo e(asset('/images/blank_profile.png')); ?>" width="100" height="100">
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="<?php echo e(route('category')); ?>" class="btn btn-secondary">一覧に戻る</a>
        </div>
    </form>
</div>
<!--
<div class="row">
    <?php echo $__env->make('operate.category.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="form-group form-inline" style="margin-top:10px;">
        <a href="<?php echo e(route('category')); ?>" class="btn btn-secondary">一覧に戻る</a>
    </div>
</div>
-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sample.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Nozomi/Documents/GitHub/TWCP2/resources/views/operate/category/details.blade.php ENDPATH**/ ?>