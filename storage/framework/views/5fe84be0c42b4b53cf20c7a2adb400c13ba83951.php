<?php $__env->startSection('contents'); ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fas fa-user-lock"></i> ユーザー管理</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="<?php echo e(route('operate.user.regist')); ?>" class="btn btn-sm btn-outline-primary">新規作成</a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h6 class="card-title">検索条件</h6>
    </div>
    <form class="form-horizontal" method="post">
        <div class="card-body">
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">氏名</label>
                <div class="col-sm-10">
                    <?php echo $form['name']; ?>

                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">メールアドレス</label>
                <div class="col-sm-10">
                    <?php echo $form['email']; ?>

                </div>
            </div>

            <div class="form-group row">
                
                <label for="type" class="col-sm-2 col-form-label">ユーザータイプ</label>
                <div class="col-sm-4">
                    <?php $__currentLoopData = $form['type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $node): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo $node; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info" name="btnSearch">上記の内容で検索</button>
            <button type="submit" class="btn btn-outline-default" name="btnSearchClear">検索条件をクリア</button>
        </div>
    </form>
</div>

<div class="card" style="margin-top:10px;">
    <div class="card-header">
        <h6 class="card-title">データ一覧</h6>
    </div>
    <div class="dard-body">
<?php if( count($rows) ): ?>
        <table class="table table-bordered table-hover dataTable dtr-inline" role="grid">
            <thead>
                <tr role="row">
                    <th>ID</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>ユーザータイプ</th>
                    <th>最終更新日時<br/>作成日時</th>
                    <th>操作</th>
                </tr>
<?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($row->id); ?></td>
                    <td><?php echo e($row->name); ?></td>
                    <td><?php echo e($row->email); ?></td>
                    <td><?php echo e($def['type'][$row->type] ?? '管理者'); ?> </td>
                    <td><?php echo e($row->updated_at); ?><br/><?php echo e($row->created_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('operate.user.detail', $row->id)); ?>" class="btn btn-outline-primary">詳細</a>
                        <a href="<?php echo e(route('operate.user.update', $row->id)); ?>" class="btn btn-outline-primary">編集</a>
                        <a href="<?php echo e(route('operate.user.delete.confirm', $row->id)); ?>" class="btn btn-outline-primary">削除</a>
                    </td>
                </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </thead>
        </table>
        <?php echo e($rows->links()); ?>

<?php else: ?>
        <span>データがありません</span>
<?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/admin/administrator/list.blade.php ENDPATH**/ ?>