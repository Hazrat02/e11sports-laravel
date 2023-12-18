<?php
$content = getContent('cta.content',true);
?>
<section class="cta-section pt-120 pb-120 bg_img" style="background-image: url( <?php echo e(getImage('assets/images/frontend/cta/'.@$content->data_values->image,'1920x780')); ?> );">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center position-relative">
                <h2><?php echo e(__(@$content->data_values->heading)); ?></h2>
                <a href="<?php echo e(@$content->data_values->button_url); ?>" class="cmn-btn mt-4"><?php echo e(__(@$content->data_values->button)); ?></a>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/sections/cta.blade.php ENDPATH**/ ?>