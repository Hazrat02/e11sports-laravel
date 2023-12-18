<?php
$content = getContent('trx_win.content', true);
$latestWinners = \App\Models\GameLog::where('win_status', '!=', 0)
->where('win_amo', '>', '0')
->take(6)
->with(['user', 'game'])
->latest('id')
->get();
$transactions = \App\Models\Transaction::with('user')
->latest()
->limit(7)
->get();
?>
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section-header text-center">
                    <h2 class="section-title"><?php echo e(__(@$content->data_values->heading)); ?></h2>
                    <p class="mt-3"><?php echo e(__(@$content->data_values->sub_heading)); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <h4 class="mb-4"><?php echo app('translator')->get('Latest Winners'); ?></h4>
                <div class="winner-slider winner-list">
                    <?php $__currentLoopData = $latestWinners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $winner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-slide">
                        <div class="winner-item">
                            <div class="winner-content">
                                <h6 class="name"><?php echo e($winner->user->fullname); ?></h6>
                                <span><?php echo e(__(@$winner->game->name)); ?></span>
                            </div>
                            <div class="winner-amount">
                                <span class="text--base"><?php echo e($general->cur_sym); ?><?php echo e(getAmount($winner->win_amo)); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-xl-8 mt-xl-0 wow fadeInUp mt-5" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <h4 class="mb-4"><?php echo app('translator')->get('Latest Transactions'); ?></h4>
                <div class="transaction-wrapper card">
                    <div class="card-body p-0">
                        <div class="table--responsive table-responsive--sm">
                            <table class="style--two mb-0 table">
                                <thead>
                                    <tr>
                                        <th><?php echo app('translator')->get('Transaction ID'); ?></th>
                                        <th><?php echo app('translator')->get('User name'); ?></th>
                                        <th><?php echo app('translator')->get('Date'); ?></th>
                                        <th><?php echo app('translator')->get('Amount'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><span>#<?php echo e($transaction->trx); ?></span></td>
                                        <td><?php echo e($transaction->user->username); ?></td>
                                        <td><?php echo e(showDateTime($transaction->created_at)); ?></td>
                                        <td><span class="text--base"><?php echo e($general->cur_sym); ?><?php echo e(getAmount($transaction->amount)); ?></span></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/sections/trx_win.blade.php ENDPATH**/ ?>