<?php $__env->startSection('css'); ?>
<style>
.box {
  width: 520px;
  margin: auto;
}
.box2 {
    width: 100%;
    position: relative;
    z-index: 1;
    background:#ccc9c970;
    max-width: 520px;
    padding: 30px 55px;
    text-align: center;
    border: 1px solid #00000061;
    box-shadow: 0 0 10px 0 rgb(7 7 7 / 10%), 0 5px 5px 0 rgb(0 0 0 / 4%);
}
.box2 h1{
    margin-bottom: 10px;
    font-size: 15px;
    font-weight: bold;
    color: gray;
}

.box2 .logo{
    margin: 25px 0;
}
.box2 .logo svg {
    color:#07d2749e;
}

.box2 p{
    font-size: 12px;
    color: gray;
}
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<body class="box">
        <div class="box2">   
            <div>
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="110" height="50" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                    </svg>
                </div>
                <div>
                    <h1>登録はまだ完了していません</h1>
                </div>
                <div>                 
                    <p>仮登録メールアドレスにメールを送信しました。<br>
                    メール内容に記載されたURLへアクセスしていただき、<br>
                    登録を完了してください。</p>
                </div>
            </div>
        </div>
</body>
</html>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/login/regist_pre_complete.blade.php ENDPATH**/ ?>