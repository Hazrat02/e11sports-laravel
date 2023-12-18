<?php
$content = getContent('why_choose_us.content', true);
$chooseElement = getContent('why_choose_us.element', false, null, true);
?>
<section class="pt-120 pb-120 dark--overlay bg_img border-top border-bottom" style="background-image: url( <?php echo e(getImage('assets/images/frontend/why_choose_us/' . @$content->data_values->image, '1920x1080')); ?> );">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                    <p class="mt-3"><?php echo e(__(@$content->data_values->subheading)); ?></p>
                </div>
            </div>
        </div>
        <div class="row mb-none-30">
            <?php $__currentLoopData = $chooseElement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                    <div class="choose-card">
                        <div class="choose-card__icon">
                            <?php echo @$choose->data_values->icon ?>
                        </div>
                        <div class="choose-card__content">
                            <h3 class="title mb-3"><?php echo e(__(@$choose->data_values->title)); ?></h3>
                            <p><?php echo e(__(@$choose->data_values->description)); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/sections/why_choose_us.blade.php ENDPATH**/ ?>