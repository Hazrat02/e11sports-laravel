<?php $__env->startSection('app'); ?>
    <?php
        $policyPages = getContent('policy_pages.element', false, null, true);
        $register = getContent('register.content', true);
    ?>

    <section class="registration-section bg_img" style="background-image: url( <?php echo e(getImage('assets/images/frontend/register/' . @$register->data_values->image, '1920x960')); ?> );">
        <div class="registration-area">
            <div class="registration-area-inner">
                <div class="text-center">
                    <a class="site-logo mb-4" href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e(getImage(getFilePath('logoIcon') . '/logo.png')); ?>" alt="site-logo">
                    </a>
                    <h2 class="title mb-3"><?php echo e(__(@$register->data_values->title)); ?></h2>
                    <p><?php echo e(__(@$register->data_values->subtitle)); ?></p>
                
                <form class="verify-gcaptcha mt-4" action="#" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <?php if(session()->get('reference') != null): ?>
                            <div class="form-group col-md-12">
                                <label for="referenceBy"><?php echo app('translator')->get('Reference By'); ?></label>

                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-user"></i></div>
                                    <input class="form-control" id="referenceBy" name="referBy" type="text" value="<?php echo e(session()->get('reference')); ?>" readonly>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group col-md-6">
                            <label for="username"><?php echo app('translator')->get('Username'); ?></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="las la-user"></i></div>
                                <input class="form-control checkUser" id="username" name="username" type="text" value="<?php echo e(old('username')); ?>" required>
                            </div>
                            <small class="text--danger usernameExist"></small>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email"><?php echo app('translator')->get('Email Address'); ?></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="las la-at"></i></div>
                                <input class="form-control checkUser" id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" required>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="country"><?php echo app('translator')->get('Country'); ?></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="las la-globe"></i></div>
                                <select class="form-control" id="country" name="country" required>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-mobile_code="<?php echo e($country->dial_code); ?>" data-code="<?php echo e($key); ?>" value="<?php echo e($country->country); ?>"><?php echo e(__($country->country)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="country"><?php echo app('translator')->get('Mobile'); ?></label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <span class="input-group-text mobile-code border-0"></span>
                                    <input name="mobile_code" type="hidden">
                                    <input name="country_code" type="hidden">
                                </div>
                                <input class="form-control checkUser" id="mobile" name="mobile" type="number" value="<?php echo e(old('mobile')); ?>" required>
                            </div>
                            <small class="text--danger mobileExist"></small>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password"><?php echo app('translator')->get('Password'); ?></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="las la-key"></i></div>
                                    <input class="form-control" id="password" name="password" type="password" required>
                                </div>
                                <?php if($general->secure_password): ?>
                                    <div class="input-popup">
                                        <p class="error lower"><?php echo app('translator')->get('1 small letter minimum'); ?></p>
                                        <p class="error capital"><?php echo app('translator')->get('1 capital letter minimum'); ?></p>
                                        <p class="error number"><?php echo app('translator')->get('1 number minimum'); ?></p>
                                        <p class="error special"><?php echo app('translator')->get('1 special character minimum'); ?></p>
                                        <p class="error minimum"><?php echo app('translator')->get('6 character password'); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password-confirm"><?php echo app('translator')->get('Confirm Password'); ?></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="las la-key"></i></div>
                                <input class="form-control" id="password-confirm" name="password_confirmation" type="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Captcha::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Captcha::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243)): ?>
<?php $component = $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243; ?>
<?php unset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243); ?>
<?php endif; ?>

                        <?php if($general->agree): ?>
                            <div class="form-group d-flex align-items-start">
                                <input class="custom_checkbox" id="agree" name="agree" type="checkbox" <?php if(old('agree')): echo 'checked'; endif; ?> required>
                                <div class="d-flex flex-wrap gap-2">
                                    <label class="ms-1 mb-0" for="agree"><?php echo app('translator')->get(' I agree with'); ?> </label>
                                    <?php $__currentLoopData = $policyPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="text--base" href="<?php echo e(route('policy.pages', [slug($policy->data_values->title), $policy->id])); ?>"><?php echo e(__($policy->data_values->title)); ?></a>
                                        <?php if(!$loop->last): ?>
                                            ,
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>
                        <?php endif; ?>

                        <div class="col-md-12 mt-3 text-center">
                            <button class="cmn-btn rounded-0 w-100" id="recaptcha" type="submit"><?php echo app('translator')->get('Register'); ?></button>
                            <p class="mt-20"><?php echo app('translator')->get('Already i have an account in here'); ?> <a class="text--base" href="<?php echo e(route('user.login')); ?>"><?php echo app('translator')->get('Login'); ?></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="modal fade" id="existModalCenter" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content section--bg">
                <div class="modal-header">
                    <h5 class="modal-title" id="existModalLongTitle"><?php echo app('translator')->get('You are with us'); ?></h5>
                    <span class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <h6 class="text-center"><?php echo app('translator')->get('You already have an account please Login '); ?></h6>
                </div>
                <div class="modal-footer">
                    <a class="cmn-btn btn-sm" href="<?php echo e(route('user.login')); ?>"><?php echo app('translator')->get('Login'); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .country-code .input-group-text {
            background: #fff !important;
        }

        .country-code select {
            border: none;
        }

        .country-code select:focus {
            border: none;
            outline: none;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php if($general->secure_password): ?>
    <?php $__env->startPush('script-lib'); ?>
        <script src="<?php echo e(asset('assets/global/js/secure_password.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        (function($) {
            <?php if($mobileCode): ?>
                $(`option[data-code=<?php echo e($mobileCode); ?>]`).attr('selected', '');
            <?php endif; ?>

            $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));

            $('.checkUser').on('focusout', function(e) {
                var url = '<?php echo e(route('user.checkUser')); ?>';
                var value = $(this).val();
                var token = '<?php echo e(csrf_token()); ?>';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate . 'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u400193054/domains/e11sports.com/public_html/core/resources/views/templates/basic/user/auth/register.blade.php ENDPATH**/ ?>