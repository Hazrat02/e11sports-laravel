<?php
$banner = getContent('banner.content',true);
?>
<section class="hero bg_img" style="background-image: url( <?php echo e(getImage('assets/images/frontend/banner/'.@$banner->data_values->image,'1920x780')); ?> );">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <div class="hero__content text-lg-left">
                    <h2 class="hero__title wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s"><?php echo e(__(@$banner->data_values->heading)); ?></h2>
                    <p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s"><?php echo e(__(@$banner->data_values->subheading)); ?></p>
                    <div class="btn-group justify-content-lg-start justify-content-center mt-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.9s">
                        <a href="<?php echo e(__(@$banner->data_values->button_url_one)); ?>" class="cmn-btn"><?php echo e(__(@$banner->data_values->button_one)); ?></a>
                        <a href="<?php echo e(__(@$banner->data_values->button_url_two)); ?>" class="cmn-btn-two"><?php echo e(__(@$banner->data_values->button_two)); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/sections/banner.blade.php ENDPATH**/ ?>