<?php $__env->startSection('contents'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo e($mode_name); ?>完了</h1>
</div>
<div class="row">
    <div><?php echo e($mode_name); ?>が完了しました<br/></div>
    <br/>
    <br/>
    <a href="<?php echo e($back); ?>" class="btn btn-primary" style="background-color: #ae1c17;">一覧に戻る</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/sample/admin_complete.blade.php ENDPATH**/ ?>