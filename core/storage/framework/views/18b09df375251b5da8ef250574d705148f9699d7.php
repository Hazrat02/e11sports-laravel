<?php
    $content = getContent('game.content', true);
    $games = \App\Models\Game::active()->get();
?>
<section class="pt-120 pb-120 section--bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                    <p class="mt-3"><?php echo e(__(@$content->data_values->subheading)); ?></p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-none-30">
            <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-4 col-sm-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                    <div class="game-card">
                        <div class="game-card__thumb">
                            <img src="<?php echo e(getImage(getFilePath('game') . '/' . $game->image, getFileSize('game'))); ?>" alt="image">
                        </div>
                        <div class="game-card__content">
                            <h4 class="game-name"><?php echo e(__($game->name)); ?></h4>
                            <a class="cmn-btn d-block btn-sm btn--capsule mt-3 text-center" href="<?php echo e(route('user.play.game', $game->alias)); ?>"><?php echo app('translator')->get('Play Now'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/sections/game.blade.php ENDPATH**/ ?>