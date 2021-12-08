<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/toppage.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="top" style="margin-top: 40px;">
        <p>記事検索</p>
    </div>

        <!--タイムライン(ループ処理使う)-->

        <section id="contents">
            <div id="contents" class="contents">
                <div id="main">
                    <ul id="pic">

                        <?php if(count($likes)): ?>
                            <?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!is_null($like)): ?>
                                    <li class="item">
                                    <h1><?php echo e($like->category_id); ?></h1>
                                    <a href="<?php echo e(Route('member.archive.detail', $like->category_id)); ?>">detail</a>  
                                    <img src="img/画像/インテリア.png" alt="インテリア">
    
                                        <span class="category" href="#">1件</span>
                                    </li>      
                                <?php endif; ?>                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                        <?php endif; ?>
                        
                    </ul>
                </div>
            </div>
        </section> 


    

<?php $__env->stopSection(); ?>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
    <!--IE11用-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <!--不必要なら削除してください-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
    <!--不必要なら削除してください-->

    <!-- モーダルウィンドウ用 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
    <!--JSを読み込み-->
    <script src="<?php echo e(asset('js/team.js')); ?>"></script>

</body>

</html>



<?php echo $__env->make('layouts.member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/member/archive/archive.blade.php ENDPATH**/ ?>