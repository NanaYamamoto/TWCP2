<?php $__env->startSection('title'); ?>
新規記事作成
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="top">
        <p>記事詳細</p>
    </div>

    <form class="form-horizontal form-label-left" enctype="multipart/form-data">
        <?php echo $__env->make('member.post.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="" style="margin:10px; display: flex;justify-content: center;align-items: center;">
            <a href="<?php echo e(route('member.mypage')); ?>" class="btn btn-svg" style="margin:0px">
                <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                </svg>
                <span>一覧に戻る</span>
            </a>
            <a href="<?php echo e(route('member.post.update', $form['id'])); ?>" class="btn btn-svg" style="margin:0px">
                <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                </svg>
                <span>編集</span>
            </a>
            <a href="<?php echo e(route('member.post.delete.proc', $form['id'])); ?>" class="btn btn-svg" style="margin:0px">
                <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                </svg>
                <span>削除</span>
            </a>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/member/post/detail.blade.php ENDPATH**/ ?>