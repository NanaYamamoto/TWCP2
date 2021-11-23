<?php $__env->startSection('contents'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo e($func_name); ?> >> <?php echo e($mode_name); ?></h1>
</div>
<div class="row">
    <?php echo e($mode_name); ?>が完了しました<br/>
    <br/>
    <br/>
    <a href="<?php echo e($back); ?>" class="btn btn-primary">一覧に戻る</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sample.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/sample/complete.blade.php ENDPATH**/ ?>