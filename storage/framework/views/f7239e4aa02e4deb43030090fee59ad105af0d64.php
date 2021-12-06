<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="<?php echo e(asset('/css/twitter.css')); ?>" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(!Auth::check() && (!isset($authgroup) || !Auth::guard($authgroup)->check())): ?>
                        <?php if(Route::has('login')): ?>
                        <li class="nav-item">
                            <?php if(isset($authgroup)): ?>
                            <a class="nav-link" href="<?php echo e(url("login/$authgroup")); ?>"><?php echo e(__('Login')); ?></a>
                            <?php else: ?>
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            <?php endif; ?>
                        </li>
                        <?php endif; ?>

                        <?php if(Route::has('register')): ?>
                        <?php if(isset($authgroup)): ?>
                        <?php if(Route::has("$authgroup-register")): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route("$authgroup-register")); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php if(isset($authgroup)): ?>
                                <?php echo e(Auth::guard($authgroup)->user()->name); ?>

                                <?php else: ?>
                                <?php echo e(Auth::user()->name); ?>

                                <?php endif; ?>
                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                </div>
                </li>
                <?php endif; ?>
                </ul>
            </div>
    </div>
    </nav>

    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    </div>
</body>

</html><?php /**PATH /Users/Nozomi/Documents/GitHub/TWCP2/resources/views/layouts/auth.blade.php ENDPATH**/ ?>