<!-- <?php $__env->startSection('css'); ?> -->

<?php $__env->startSection('title'); ?>
新規記事作成
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--記事作成-->

    <div class="top">
        <p>記事登録</p>
    </div>


    <form action="<?php echo e(route('post.regist.proc')); ?>" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('admin.post.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="" style="margin:10px; display: flex;justify-content: center;align-items: center;">
            <a href="<?php echo e(route('post.home')); ?>" class="btn btn-svg" style="margin:0px">
                <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                </svg>
                <span>一覧に戻る</span>
            </a>
            <button type="submit" class="btn btn-svg" >
                <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                </svg>
                <span>新規作成</span>
            </button>
        </div>
    </form>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/admin/post/regist.blade.php ENDPATH**/ ?>