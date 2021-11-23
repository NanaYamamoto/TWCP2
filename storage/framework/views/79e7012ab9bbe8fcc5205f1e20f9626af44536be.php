<?php $__env->startSection('contents'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">カテゴリー管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('operate.category.regist')); ?>" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>公開フラグ</th>
            <th>写真</th>
            <th>作成日時</th>
            <th>更新日時</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">

        <?php $__currentLoopData = $categorie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($category->id); ?></td>
                <td><?php echo e($category->name); ?></td>
                <td><?php echo e($category->active); ?></td>
                <td><?php echo e($category->img); ?></td>
                <td><?php echo e(date('Y.m.d',strtotime($category->created_at))); ?></td>
                <td><?php echo e(date('Y.m.d',strtotime($category->updated_at))); ?></td>
                <td class="text-nowrap">
                    <p><a href="<?php echo e(route('operate.category.details', [$category->id] )); ?>" class="btn btn-primary btn-sm">詳細</a></p>
                    <p><a href="" class="btn btn-info btn-sm">編集</a></p>
                    <p><a href="<?php echo e(route('operate.category.delete.confirm', [$category->id] )); ?>" class="btn btn-danger btn-sm">削除</a></p>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('sample.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/operate/category/category.blade.php ENDPATH**/ ?>