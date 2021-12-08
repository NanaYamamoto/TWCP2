<div id="contents" class="cp_iptxt">
    <label for="title" class="d-flex">タイトル</label>
    <?php echo $form['title']; ?>

    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <span id="name-error" class="error invalid-feedback" style="display:block"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <span class="focus_line"></span>
</div>
<div id="contents" class="cp_iptxt">
    <label for="category_id" class="d-flex">カテゴリー</label>
    <?php echo $form['category_id']; ?>

    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <span id="name-error" class="error invalid-feedback" style="display:block"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <!--この部分だけ赤線を排除-->
    <span class="focus_line-z"></span>
</div>

<div id="contents" class="cp_iptxt">
    <label for="content" class="d-flex">記事内容</label>
    <?php echo $form['content']; ?>

    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <span id="name-error" class="error invalid-feedback" style="display:block"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <span class="focus_line"></span>
</div>


<div id="contents" class="cp_iptxt">
    <label for="img" class="d-flex">画像</label>
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




<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script lang="text/javascript">
    $(function() {
        if ($('input[name=type]:checked').val() == 2) {
            $('div[id=url]').show();
            $('div[id=content]').hide();
        }
        $('input[name=type]').change(function() {
            let val = $(this).val();
            if (val == 1) {
                $('div[id=url]').hide();
                $('div[id=content]').show();
            } else {
                $('div[id=url]').show();
                $('div[id=content]').hide();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?><?php /**PATH /Applications/MAMP/htdocs/TWCP2/resources/views/member/post/form.blade.php ENDPATH**/ ?>