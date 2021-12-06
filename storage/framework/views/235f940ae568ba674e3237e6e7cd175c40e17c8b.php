
<?php
$type = 1;
if( isset($data) ) $type = $data->type;
if( isset($form['type']) && !is_array( $form['type'] ) ) $type = $form['type'];
if( isset($form['type']) && $form['type'] == '公開' ) $type = 2;
if( isset($form['type']) && $form['type'] == '非公開' ) $type = 1;
?>




<div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">名前</label>
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
    <label for="publish" class="col-sm-2 col-form-label">公開フラグ</label>
    <div class="col-sm-10">
    <?php if( is_array( $form['active']) ): ?>
        <?php $__currentLoopData = $form['active']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $node): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo $node; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <?php echo $form['active']; ?>

    <?php endif; ?>
<?php $__errorArgs = ['active'];
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
    <label for="img" class="col-sm-2 col-form-label">カテゴリー画像</label>
    <div class="col-sm-10">
        <?php echo $form['img']; ?>

        <?php $__errorArgs = ['img'];
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
<?php $__env->stopSection(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/operate/category/form.blade.php ENDPATH**/ ?>