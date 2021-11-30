<?php $__env->startSection('contents'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-user-minus"></i> 削除</h1>
</div>
<div class="row">
    <form action="<?php echo e(route('admin.delete.proc')); ?>" class="form-horizontal form-label-left" method="post">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('operate.administrator.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="<?php echo e(route('admin')); ?>" class="btn btn-secondary mr-2">キャンセル</a>
            <button class="btn btn-primary">削除処理</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Nozomi/Documents/GitHub/TWCP2/resources/views/operate/administrator/delete_confirm.blade.php ENDPATH**/ ?>