<?php $__env->startSection('content'); ?>
<main class="col-md-10 col-lg-10 offset-1 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo e($mode_name); ?></h1>
</div>
<div class="row ms-1">
    <?php echo e($mode_name); ?>が完了しました<br/>
    <br/>
    <br/>
    <a href="<?php echo e($back); ?>" class="btn btn-primary">一覧に戻る</a>
</div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/sample/post_complete.blade.php ENDPATH**/ ?>