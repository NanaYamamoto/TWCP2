<!-- <?php $__env->startSection('css'); ?> -->

<?php $__env->startSection('title'); ?>
検索記事表示
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/top.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--記事作成-->

<div class="top" style="margin-bottom: 40px;">
    <p>記事検索</p>
</div>

<div class="search-area">
    <form role="search" method="post" style="position: relative;">
        <?php echo csrf_field(); ?>
        <input type="text" value="" name="keyword" id="search-text" placeholder="search" style="width: 80%; margin: auto; border-radius: 20px; border: 1px solid; padding-left: 10px;">
        <input type="submit" id="searchsubmit" name="btnSearch" value="検索" style="position: absolute; top: 0px; right: 12rem; border-top-right-radius: 20px; border-bottom-right-radius: 20px; border: 1px solid;">
        <input type="submit" id="searchsubmit" name="btnSearch" value="❌" style="position: absolute; top: 0px; right: 15rem; background: none; border: none;">

    </form>
</div>
<!--/search-wrap-->


<ul id="gallery" class="gallery bgappearTrigger">
    <?php if( count($rows) ): ?>
    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="bgextend bgLRextendTrigger zoomInRotate">
        <div class="bgappearTrigger">
            <a href="<?php echo e(route('member.post.detail', $row->id)); ?>" data-lightbox="gallery-group">
                <?php if(!empty($row->img)): ?>
                <img src="<?php echo e($row->img); ?>" style="object-fit: cover; width: 200px; height: 200px;">
                <?php else: ?>
                <img src="/images/blank_profile.png" style="object-fit: cover; width: 200px; height: 200px;">
                <?php endif; ?>
            </a>
            <p style="display: inline-block;"><?php echo e($row->title); ?><br>
                <?php echo e($row->created_at); ?><br>
                <?php echo e($row->user->name); ?>さんの投稿
            </p>
            <a class="love hide-text" data-remote="true" rel="nofollow" data-method="POST" href=""><i class="far fa-heart" style="display: inline-block; padding-left: 10px;"></i></a>

        </div>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</ul>

<!-- <div id="container" class="wrapper">
    <main>
        <?php if( count($rows) ): ?>

        <article>
            <h1 class="article-title" style="font-size: 1.5rem; padding-bottom: 30px;"><a href="#">おすすめの投稿</a></h1>
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><a href="#"><?php echo e($row->title); ?></a></h2>
            <ul class="meta">
                <li><a href="#"><?php echo e($row->created_at); ?></a></li>
                <li><a href="#"><?php echo e($row->category_id); ?></a></li>
                <li><a href="#"><?php echo e($row->user->name); ?>さんの投稿</a></li>
            </ul>
            <a href="#"><img src="/images/画像/インテリア.png" alt="テキストテキストテキスト"></a>
            <p class="text">
                <?php echo e($row->content); ?>

            </p>
            <div class="readmore"><a href="#">READ MORE</a></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </article>




        <?php else: ?>
        <span>記事がありません</span>
        <?php endif; ?>
    </main>

    <aside id="sidebar">

        <section id="news">

            <div class="tab-area bgextend">
                <div class="bgappear">
                    <ul class="tab">

                        <li><a href="#recommendation">あなたへのおすすめ</a></li>
                        <li><a href="#cars">人気記事</a></li>
                    </ul>
                    <div class="tab-choice-area">

                        <div id="recommendation" class="area is-active">
                            <ul>
                                <li><a href="#"><time datetime="2021-09-23">2021.09.23</time>PHP</a></li>
                                <li><a href="#"><time datetime="2021-07-15">2021.07.15</time>Javascript</a></li>
                                <li><a href="#"><time datetime="2021-05-12">2021.05.12</time>Laravel</a></li>
                            </ul>
                        </div>
                        <div id="cars" class="area">
                            <ul>
                                <li><a href="#"><time datetime="2021-11-11">2021.11.11</time>インポートカーお披露目</a></li>
                                <li><a href="#"><time datetime="2021-06-07">2021.06.07</time>ドイツ・フランス車フェア</a></li>
                                <li><a href="#"><time datetime="2021-03-01">2021.03.01</time>買い替えをご検討中の方へ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="archive">
            <h3 class="side-title">人気投稿者一覧</h3>
            <ul>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
                <li><a href="#">林航平</a>(XX)</li>
            </ul>
        </section>
    </aside>
</div> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/member/post/search.blade.php ENDPATH**/ ?>