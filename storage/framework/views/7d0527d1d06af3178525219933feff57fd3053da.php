<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">


    <?php echo $__env->yieldContent('css'); ?>
    <title>暮らしのアプリ <?php echo $__env->yieldContent('title'); ?></title>

    <meta name="description" content="<?php echo $__env->yieldContent('head-description'); ?>" />
</head>

<body>
    <!--ページトップ(黒帯)-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-5" width:1400px;>
        <a class="navbar-brand" href="/">暮らしのアプリ</a>
        <div class="collapse navbar-collapse"></div>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

    

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
    <!--IE11用-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
    <!--JSを読み込み-->
    <script src="<?php echo e(asset('js/newpost.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/layouts/guest.blade.php ENDPATH**/ ?>