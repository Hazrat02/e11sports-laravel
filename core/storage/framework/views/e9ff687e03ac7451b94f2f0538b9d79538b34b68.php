<?php
$content = getContent('faq.content', true);
$faqs = getContent('faq.element', false, null, true);
?>
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                    <p class="mt-3"><?php echo e(__(@$content->data_values->subheading)); ?></p>
                </div>
            </div>
            <div class="col-lg-12 order-lg-1 order-2">
                <div class="faq-content">
                    <div class="accordion cmn-accordion" id="faqAccordion-two">
                        <div class="row mb-none-30">
                            <div class="col-lg-6 mb-30">
                                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->odd): ?>
                                        <div class="card">
                                            <div class="card-header" id="h-<?php echo e($loop->iteration); ?>">
                                                <button class="acc-btn collapsed" data-bs-toggle="collapse" data-bs-target="#c-<?php echo e($loop->iteration); ?>" type="button" aria-expanded="false" aria-controls="c-<?php echo e($loop->iteration); ?>">
                                                    <span class="text"><?php echo e(__(@$faq->data_values->question)); ?></span>
                                                    <span class="plus-icon"></span>
                                                </button>
                                            </div>
                                            <div class="collapse" id="c-<?php echo e($loop->iteration); ?>" data-bs-parent="#faqAccordion-two" aria-labelledby="h-<?php echo e($loop->iteration); ?>">
                                                <div class="card-body">
                                                    <p><?php echo e(__(@$faq->data_values->answer)); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="col-lg-6 mb-30">
                                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->even): ?>
                                        <div class="card">
                                            <div class="card-header" id="h-<?php echo e($loop->iteration); ?>">
                                                <button class="acc-btn collapsed" data-bs-toggle="collapse" data-bs-target="#c-<?php echo e($loop->iteration); ?>" type="button" aria-expanded="false" aria-controls="c-<?php echo e($loop->iteration); ?>">
                                                    <span class="text"><?php echo e(__(@$faq->data_values->question)); ?></span>
                                                    <span class="plus-icon"></span>
                                                </button>
                                            </div>
                                            <div class="collapse" id="c-<?php echo e($loop->iteration); ?>" data-bs-parent="#faqAccordion-two" aria-labelledby="h-<?php echo e($loop->iteration); ?>">
                                                <div class="card-body">
                                                    <p><?php echo e(__(@$faq->data_values->answer)); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/sections/faq.blade.php ENDPATH**/ ?>