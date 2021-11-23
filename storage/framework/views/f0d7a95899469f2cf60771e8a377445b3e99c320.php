<?php $__env->startSection('css'); ?>
<!-- ログインフォームCSS -->
<style>
body {
    background: url("/images/画像/インテリア.png") no-repeat center;
    background-size: cover;
    background-attachment: fixed;
}
.login-page {
  width: 400px;
  margin: auto;
}
.login-page h1{
    margin-bottom: 25px;
    font-size: 30px;
    font-weight: bold;
    color: white;
    text-align: center;
}
.form {
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    max-width: 400px;
    padding: 40px 55px;
    text-align: center;
    border: 1px solid #00000061;
    box-shadow: 0 0 10px 0 rgb(7 7 7 / 10%), 0 5px 5px 0 rgb(0 0 0 / 4%);
}
.form .login-form{
    width: 100%;
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 30px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form input:hover,.form input:focus {
    background: #ecebeb;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #212529;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #4c4d4c;
}

.form .forgot-pass{
    font-size: 13px;
}
.form .forgot-pass:hover{
    color: rgba(0, 60, 255, 0.671);
}
.regist-link a{
    font-size: 15px;
    color: white;
    text-decoration: none;
    margin-top: 7px;
    display: block;
    text-align: center;
}
.regist-link a:hover{
    color: rgb(255, 255, 255, 0.747);
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
    <div class="login-page">
        <h1>Register</h1>
        <div class="form">

            <!--入力フォームバリデーションエラーの表示-->
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <!--ログインエラーの表示-->
            <?php if(session('login_error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('login_error')); ?>

            </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('regist.confirm')); ?>" class="login-form" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
                <input name="name" type="text" placeholder="名前" autofocus/>
                <input name="email" type="text" placeholder="メールアドレス"/>
                <input name="password" type="password" placeholder="パスワード"/>
                
                <button type="submit">確認画面</button>
            </form>
            
        </div>
        <div class="regist-link">
            <a href="<?php echo e(route('showLogin')); ?>">ログイン</a>
        </div>
    </div>
</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/login/regist_form.blade.php ENDPATH**/ ?>