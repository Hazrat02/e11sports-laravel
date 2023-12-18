<?php $__env->startSection('app'); ?>
<?php
$login = getContent('login.content',true);
?>
<section class="login-section bg_img" style="background-image: url( <?php echo e(getImage('assets/images/frontend/login/' . @$login->data_values->image, '1920x1280')); ?> );">
    <div class="login-area">
        <div class="login-area-inner">
            <div class="text-center">
                <a class="site-logo mb-4" href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(getImage(getFilePath('logoIcon') . '/logo.png')); ?>" alt="site-logo">
                </a>
                <h2 class="title mb-2"><?php echo e(__(@$login->data_values->title)); ?></h2>
                <p><?php echo e(__(@$login->data_values->subtitle)); ?></p>
            </div>
            
            <form method="POST" action="" class="login-form mt-50 verify-gcaptcha">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label><?php echo app('translator')->get('Username or Email'); ?></label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="las la-user"></i></div>
                        <input type="text" class="form-control" value="<?php echo e(old('username')); ?>" name="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label><?php echo app('translator')->get('Password'); ?></label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="las la-key"></i></div>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>

                <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Captcha::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Captcha::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243)): ?>
<?php $component = $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243; ?>
<?php unset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243); ?>
<?php endif; ?>

                <div class="mt-5">
                    <button type="submit" id="recaptcha" class="cmn-btn rounded-0 w-100"><?php echo app('translator')->get('Login Now'); ?></button>
                    <div class="mt-20 d-flex flex-wrap justify-content-between">
                        <?php if($general->registration): ?>
                        <p><?php echo app('translator')->get("Haven't an account?"); ?> <a href="<?php echo e(route('user.register')); ?>" class="text--base"><?php echo app('translator')->get('Create an account'); ?></a></p>
                        <?php endif; ?>
                        <p><a href="<?php echo e(route('user.password.request')); ?>" class="text--base"><?php echo app('translator')->get('Forget password?'); ?></a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($activeTemplate.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/user/auth/login.blade.php ENDPATH**/ ?>