<?php
$statistics = getContent('statistics.element',false,null,true);
?>
<section class="statistics-section  section--bg">
    <div class="shape-1"></div>
    <div class="shape-2"></div>
    <div class="container">
        <div class="row mb-none-30">
            <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statistic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 col-6 mb-30">
                <div class="stat-card">
                    <div class="stat-card__icon wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.3s">
                        <?php echo @$statistic->data_values->icon ?>
                    </div>
                    <div class="stat-card__content wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.5s">
                        <h6 class="title"><?php echo e(__(@$statistic->data_values->title)); ?></h6>
                        <span class="numbers"><?php echo e(__(@$statistic->data_values->amount)); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/sections/statistics.blade.php ENDPATH**/ ?>