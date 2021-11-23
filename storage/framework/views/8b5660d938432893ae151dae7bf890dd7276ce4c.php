<?php $__env->startSection('contents'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">メンバー管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('operate.members.regist')); ?>" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>

<div class="row">
    <form action="<?php echo e(route('operate.members.regist.confirm')); ?>" class="form-horizontal form-label-left" method="post">
        <?php echo $__env->make('operate.members.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="form-group form-inline" style="margin-top:10px;">
            <a href="<?php echo e(route('operate.members')); ?>" class="btn btn-secondary">一覧に戻る</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sample.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/operate/members/detail.blade.php ENDPATH**/ ?>