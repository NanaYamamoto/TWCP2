<?php $__env->startSection('contents'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">カテゴリー管理 >> 削除</h1>
</div>
<div class="row">
    <form action="<?php echo e(route('category.delete.proc')); ?>" class="form-horizontal form-label-left" method="post">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('operate.category.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="<?php echo e(route('category')); ?>" class="btn btn-secondary">キャンセル</a>
            <button class="btn btn-primary">削除処理</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sample.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Nozomi/Documents/GitHub/TWCP2/resources/views/operate/category/delete_confirm.blade.php ENDPATH**/ ?>