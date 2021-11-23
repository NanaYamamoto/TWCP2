<?php $__env->startSection('contents'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-user-plus"></i> 新規作成</h1>
</div>
<div class="row">
    <form action="<?php echo e(route('operate.admin.regist.proc')); ?>" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('operate.administrator.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="<?php echo e(route('operate.admin.regist')); ?>" class="btn btn-secondary mr-2">入力に戻る</a>
            <button class="btn btn-primary">確認画面へ</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/operate/administrator/regist_confirm.blade.php ENDPATH**/ ?>