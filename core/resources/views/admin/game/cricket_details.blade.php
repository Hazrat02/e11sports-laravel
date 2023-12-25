@extends('admin.layouts.app')

@section('panel')
<div class="row">
    <div class="col-12">
        <div class="row gy-4">

            <div class="col-xxl-3 col-sm-6">
                <div class="widget-two style--two box--shadow2 b-radius--5 bg--19">
                    <div class="widget-two__icon b-radius--5 bg--primary">
                        <i class="las la-money-bill-wave-alt"></i>
                    </div>
                    <div class="widget-two__content">
                        <h3 class="text-white">{{ $general->cur_sym }}6565</h3>
                        <p class="text-white">@lang('Balance')</p>
                    </div>
                    <a class="widget-two__btn" href="{{ route('admin.report.transaction') }}?search={{ $user->username }}">@lang('View All')</a>
                </div>
            </div>

            <div class="col-xxl-3 col-sm-6">
                <div class="widget-two style--two box--shadow2 b-radius--5 bg--primary">
                    <div class="widget-two__icon b-radius--5 bg--primary">
                        <i class="las la-wallet"></i>
                    </div>
                    <div class="widget-two__content">
                        <h3 class="text-white">{{ $general->cur_sym }}sdfs</h3>
                        <p class="text-white">@lang('Deposits')</p>
                    </div>
                    <a class="widget-two__btn" href="{{ route('admin.deposit.list') }}?search={{ $user->username }}">@lang('View All')</a>
                </div>
            </div>

            <div class="col-xxl-3 col-sm-6">
                <div class="widget-two style--two box--shadow2 b-radius--5 bg--1">
                    <div class="widget-two__icon b-radius--5 bg--primary">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="widget-two__content">
                        <h3 class="text-white">{{ $general->cur_sym }}ewwe</h3>
                        <p class="text-white">@lang('Withdrawals')</p>
                    </div>
                    <a class="widget-two__btn" href="{{ route('admin.withdraw.log') }}?search={{ $user->username }}">@lang('View All')</a>
                </div>
            </div>

            <div class="col-xxl-3 col-sm-6">
                <div class="widget-two style--two box--shadow2 b-radius--5 bg--17">
                    <div class="widget-two__icon b-radius--5 bg--primary">
                        <i class="las la-gamepad"></i>
                    </div>
                    <div class="widget-two__content">
                        <h3 class="text-white">4334</h3>
                        <p class="text-white">@lang('Total Played')</p>
                    </div>
                    <a class="widget-two__btn" href="{{ route('admin.game.log') }}?search={{ $user->username }}">@lang('View All')</a>
                </div>
            </div>

            

        </div>

        <div class="d-flex mt-4 flex-wrap gap-3">
            

            <div class="flex-fill">
                <a class="btn btn--primary btn--gradi btn--shadow w-100 btn-lg" href="" target="_blank">
                    <i class="las la-sign-in-alt"></i>@lang('Login as User')
                </a>
            </div>
            <div class="flex-fill">
                <a class="btn btn--primary btn--gradi btn--shadow w-100 btn-lg" href="" target="_blank">
                    <i class="las la-sign-in-alt"></i>@lang('Login as User')
                </a>
            </div>

          
        </div>

        <div class="card mt-30">
            <div class="card-header">
                <h5 class="card-title mb-0">@lang('Information of') sdf</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn--primary w-100 h-45" type="Update">@lang('Submit')
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

{{-- Add Sub Balance MODAL --}}
<div class="modal fade" id="addSubModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="type"></span> <span>@lang('Balance')</span></h5>
                <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <input name="act" type="hidden">
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('Amount')</label>
                        <div class="input-group">
                            <input class="form-control" name="amount" type="number" step="any" placeholder="@lang('Please provide positive amount')" required>
                            <div class="input-group-text">{{ __($general->cur_text) }}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>@lang('Remark')</label>
                        <textarea class="form-control" name="remark" placeholder="@lang('Remark')" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn--primary h-45 w-100" type="submit">@lang('Submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    (function($) {
            "use strict"
            $('.bal-btn').click(function() {
                var act = $(this).data('act');
                $('#addSubModal').find('input[name=act]').val(act);
                if (act == 'add') {
                    $('.type').text('Add');
                } else {
                    $('.type').text('Subtract');
                }
            });
            let mobileElement = $('.mobile-code');
            $('select[name=country]').change(function() {
                mobileElement.text(`+${$('select[name=country] :selected').data('mobile_code')}`);
            });

            $('select[name=country]').val('{{ @$user->country_code }}');
            let dialCode = $('select[name=country] :selected').data('mobile_code');
            let mobileNumber = `{{ $user->mobile }}`;
            mobileNumber = mobileNumber.replace(dialCode, '');
            $('input[name=mobile]').val(mobileNumber);
            mobileElement.text(`+${dialCode}`);

        })(jQuery);
</script>
@endpush