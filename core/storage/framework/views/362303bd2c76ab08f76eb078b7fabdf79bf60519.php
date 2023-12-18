<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> <?php echo e($general->siteName(__($pageTitle))); ?></title>

    <?php echo $__env->make('partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <link href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/global/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/global/css/line-awesome.min.css')); ?>" rel="stylesheet" />

    <link href="<?php echo e(asset($activeTemplateTrue . 'css/lightcase.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset($activeTemplateTrue . 'css/vendor/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset($activeTemplateTrue . 'css/vendor/slick.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset($activeTemplateTrue . 'css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset($activeTemplateTrue . 'css/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset($activeTemplateTrue.'css/color.php?color='.$general->base_color)); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('style-lib'); ?>
    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>
    <?php echo $__env->yieldPushContent('fbComment'); ?>

    <div class="preloader">
        <div class="preloader__inner">
            <div class="preloader__thumb">
                <img class="loaderLogo mt-3" src="<?php echo e(getImage(getFilePath('logoIcon') . '/logo.png')); ?>" alt="imge">
                <img class="loadercircle" src="<?php echo e(asset($activeTemplateTrue . 'images/preloader-dice.png')); ?>" alt="image">
            </div>
        </div>
    </div>

    <div class="page-wrapper" id="main-scrollbar" data-scrollbar>

        <?php echo $__env->yieldContent('app'); ?>

    </div>

    <div class="win-loss-popup">
        <div class="win-loss-popup__bg">
            <div class="win-loss-popup__inner">
                <div class="win-loss-popup__body">
                    <img class="img-glow lose d-none" src="<?php echo e(asset($activeTemplateTrue . 'images/play/lose-message.png')); ?>" alt="lose message image">
                    <img class="img-glow win d-none" src="<?php echo e(asset($activeTemplateTrue . 'images/play/win-message.png')); ?>" alt="win message image">
                </div>
                <div class="win-loss-popup__footer">
                    <h2 class="result-text"><?php echo app('translator')->get('The result is'); ?> <span class="data-result"></span></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-to-top">
        <span class="scroll-icon">
            <i class="las la-arrow-up"></i>
        </span>
    </div>

    <?php
    $cookie = App\Models\Frontend::where('data_keys', 'cookie.data')->first();
    ?>

    <?php if(($cookie->data_values->status == Status::ENABLE) && !\Cookie::get('gdpr_cookie')): ?>
    <div class="cookies-card hide text-center">
        <div class="cookies-card__icon bg--base">
            <i class="las la-cookie-bite"></i>
        </div>
        <p class="cookies-card__content mt-4"><?php echo e($cookie->data_values->short_desc); ?> <a class="text--base" href="<?php echo e(route('cookie.policy')); ?>" target="_blank"><?php echo app('translator')->get('learn more'); ?></a></p>
        <div class="cookies-card__btn mt-4">
            <a class="cmn-btn w-100 policy text-white" href="javascript:void(0)"><?php echo app('translator')->get('Allow'); ?></a>
        </div>
    </div>
    <?php endif; ?>

    <script src="<?php echo e(asset('assets/global/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/global/js/bootstrap.bundle.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script-lib'); ?>

    <?php echo $__env->yieldPushContent('script'); ?>

    <?php echo $__env->make('partials.plugins', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset($activeTemplateTrue . '/js/vendor/lightcase.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . '/js/vendor/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . '/js/vendor/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset($activeTemplateTrue . '/js/app.js')); ?>"></script>

    <script>
        (function($) {
            "use strict";
            $(".langSel").on("change", function() {
                window.location.href = "<?php echo e(route('home')); ?>/change/" + $(this).val();
            });

            $('.policy').on('click', function() {
                $.get('<?php echo e(route('cookie.accept')); ?>', function(response) {
                    $('.cookies-card').addClass('d-none');
                });
            });

            setTimeout(function() {
                $('.cookies-card').removeClass('hide')
            }, 2000);

            var inputElements = $('[type=text],[type=password],[type=email],[type=number],select,textarea');
            $.each(inputElements, function(index, element) {
                element = $(element);
                element.closest('.form-group').find('label').attr('for', element.attr('name'));
                element.attr('id', element.attr('name'))
            });

            $.each($('input, select, textarea'), function (i, element) {
                var elementType = $(element);
                if(elementType.attr('type') != 'checkbox'){
                    if (element.hasAttribute('required')) {
                        $(element).closest('.form-group').find('label').addClass('required');
                    }
                }
            });

            Array.from(document.querySelectorAll('table')).forEach(table => {
                let heading = table.querySelectorAll('thead tr th');
                Array.from(table.querySelectorAll('tbody tr')).forEach((row) => {
                    Array.from(row.querySelectorAll('td')).forEach((colum, i) => {
                        colum.setAttribute('data-label', heading[i].innerText)
                    });
                });
            });


        })(jQuery);
    </script>

</body>

</html>
<?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/layouts/app.blade.php ENDPATH**/ ?>