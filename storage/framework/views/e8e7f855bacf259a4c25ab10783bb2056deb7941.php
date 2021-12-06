
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">名前</label>
    <div class="col-sm-10">
        <?php echo $form['name']; ?>

        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="name-error" class="error invalid-feedback" style="display:block"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">メールアドレス</label>
    <div class="col-sm-10">
        <?php echo $form['email']; ?>

        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="name-error" class="error invalid-feedback" style="display:block"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">パスワード</label>
    <div class="col-sm-10">
        <?php echo $form['password']; ?>

        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="name-error" class="error invalid-feedback" style="display:block"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>

<div class="form-group row">
    <label for="icon_url" class="col-sm-2 col-form-label">プロフィール画像</label>
    <div class="col-sm-10">
        <?php echo $form['icon_url']; ?>

        <?php $__errorArgs = ['icon_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="name-error" class="error invalid-feedback" style="display:block"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>





<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <script lang="text/javascript">
        $( function(){
            if( $('input[name=type]:checked').val() == 2) {
                $('div[id=url]').show();
                $('div[id=content]').hide();
            }
            $('input[name=type]').change( function(){
                let val = $(this).val();
                if( val == 1 ) {
                    $('div[id=url]').hide();
                    $('div[id=content]').show();
                } else {
                    $('div[id=url]').show();
                    $('div[id=content]').hide();
                }
            } );
        } );
    </script>
<?php $__env->stopSection(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/operate/members/form.blade.php ENDPATH**/ ?>