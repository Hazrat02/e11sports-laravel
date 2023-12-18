<?php
$content = getContent('blog.content',true);
$blogs = getContent('blog.element',false,3);
?>
<section class="pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                    <p class="mt-3"><?php echo e(__(@$content->data_values->subheading)); ?></p>
                </div>
            </div>
        </div>
        <div class="row mb-none-30 justify-content-center">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="post-card">
                    <div class="post-card__thumb">
                        <img src="<?php echo e(getImage('assets/images/frontend/blog/thumb_'.@$blog->data_values->image,'350x250')); ?>" alt="image">
                        <span class="post-card__date"><?php echo e(@$blog->created_at->format('d M, Y')); ?></span>
                    </div>
                    <div class="post-card__content">
                        <h3 class="post-card__title mt-2 mb-3"><a href="<?php echo e(route('blog.details', [slug(@$blog->data_values->title), $blog->id])); ?>"><?php echo e(__(@$blog->data_values->title)); ?></a>
                        </h3>
                        <a href="<?php echo e(route('blog.details', [slug(@$blog->data_values->title), $blog->id])); ?>" class="cmn-btn btn-sm mt-3"><?php echo app('translator')->get('Read More'); ?></a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/sections/blog.blade.php ENDPATH**/ ?>