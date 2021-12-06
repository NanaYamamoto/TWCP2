<?php $__env->startSection('contents'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">お知らせ管</h1>
</div>

<div class="row">
    <!-- <form action="<?php echo e(route('post.regist')); ?>" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data"> -->
        <?php echo $__env->make('admin.post.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="<?php echo e(route('post.home')); ?>" class="btn btn-secondary">一覧に戻る</a>
        </div>
    <!-- </form> -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/admin/post/detail.blade.php ENDPATH**/ ?>