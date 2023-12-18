<?php
$content = getContent('how_work.content',true);
$howWorks = getContent('how_work.element',false,null,true);
?>
<section class="pt-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title style--two"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                </div>
            </div>
        </div>
        <div class="row mb-none-50">
            <?php $__currentLoopData = $howWorks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $work): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6 mb-50 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="work-card">
                    <div class="work-card__icon">
                        <span class="step-number"><?php echo e($loop->iteration); ?></span>
                        <?php echo @$work->data_values->icon ?>
                    </div>
                    <div class="work-card__content">
                        <h4 class="title mb-3"><?php echo e(__(@$work->data_values->title)); ?></h4>
                        <p><?php echo e(__(@$work->data_values->description)); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/sections/how_work.blade.php ENDPATH**/ ?>