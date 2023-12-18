<?php
$pages = App\Models\Page::where('tempname',$activeTemplate)->where('is_default',Status::NO)->get();
?>
<header class="header">
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-xl align-items-center p-0">
                <a class="site-logo site-title" href="<?php echo e(route('home')); ?>"><img src="<?php echo e(getImage(getFilePath('logoIcon') . '/logo.png')); ?>" alt="site-logo"></a>
                <button class="navbar-toggler ml-auto" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu m-auto">
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('pages', [$data->slug])); ?>"><?php echo e(__($data->name)); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('games')); ?>"><?php echo app('translator')->get('Games'); ?></a></li>
                        <li><a href="<?php echo e(route('blog')); ?>"><?php echo app('translator')->get('Blog'); ?></a></li>
                        <li><a href="<?php echo e(route('contact')); ?>"><?php echo app('translator')->get('Contact'); ?></a></li>
                    </ul>
                    <div class="nav-right">

                        <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(route('user.home')); ?>"><i class="las la-tachometer-alt"></i> <?php echo app('translator')->get('Dashboard'); ?></a>
                        <a href="<?php echo e(route('user.logout')); ?>"><i class="las la-sign-out-alt"></i> <?php echo app('translator')->get('Logout'); ?>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(route('user.login')); ?>"><i class="las la-sign-in-alt"></i> <?php echo app('translator')->get('Login'); ?>
                        </a>
                        <?php if($general->registration): ?>
                        <a href="<?php echo e(route('user.register')); ?>"><i class="las la-user-plus"></i> <?php echo app('translator')->get('Registration'); ?></a>
                        <?php endif; ?>
                        <?php endif; ?>

                        <?php if($general->language): ?>
                        <select class="langSel">
                            <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->code); ?>" <?php if(session('lang')==$item->code): ?> selected <?php endif; ?>><?php echo e(__($item->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php endif; ?>

                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>

<?php $__env->startPush('style'); ?>
<style>
    .nav-right .langSel {
        padding: 7px 20px;
        height: 37px;
    }
</style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/partials/header.blade.php ENDPATH**/ ?>