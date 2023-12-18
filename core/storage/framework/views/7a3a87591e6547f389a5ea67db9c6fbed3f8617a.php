<?php
$content = getContent('testimonial.content', true);
$testimonials = getContent('testimonial.element');
?>
<section class="pt-120 pb-120 overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title style--two"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-slider">
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-slide">
                        <div class="testimonial-card">
                            <div class="testimonial-card__content">
                                <div class="testimonial-card__content-inner">
                                    <p><?php echo e(__(@$testimonial->data_values->quote)); ?></p>
                                </div>
                            </div>
                            <div class="testimonial-card__thumb">
                                <img src="<?php echo e(getImage('assets/images/frontend/testimonial/' . @$testimonial->data_values->image, '100x100')); ?>" alt="image">
                            </div>
                            <h6 class="name mt-2"><?php echo e(__(@$testimonial->data_values->name)); ?></h6>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/sections/testimonial.blade.php ENDPATH**/ ?>