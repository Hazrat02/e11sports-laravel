@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="container">

        <div class="row mb-3 mt-2 justify-content-around align-content-center">

            <div class="col-lg-4 col-md-6 mb-30">
                <div class="d-widget dashbaord-widget-card d-widget-win">
                    <div class="d-widget-icon">
                        <i class="las la-trophy"></i>
                    </div>
                    <div class="d-widget-content">
                        <p>@lang('Total Win')</p>
                        <h2 class="title">{{ $win }} {{ $general->cur_text }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="d-widget dashbaord-widget-card d-widget-loss">
                    <div class="d-widget-icon">
                        <i class="las la-money-bill-alt"></i>
                    </div>
                    <div class="d-widget-content">
                        <p>@lang('Total Loss')</p>
                        <h2 class="title">{{ $loss }} {{ $general->cur_text }}</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table--responsive">
                                <table class="style--two table">
                                    <thead>
                                        <tr>
                                            <th>@lang('Game Name')</th>
                                            <th>@lang('You Select')</th>
                                            <th>@lang('Result')</th>
                                            <th>@lang('Invest')</th>
                                            <th>@lang('Win or Lost')</th>
                                            <th>@lang('Action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($logs as $log)
                                            <tr>
                                                <td>
                                                    <span class="text-end">{{ __($log->betdata->game) }}</span>
                                                </td>
                                                <td>
                                                    <div>

                                                        {{ __($log->choose) }}

                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        @if ($log->status == '2')
                                                            <span class="badge badge--success"><i class="las la-smile"></i>
                                                                @lang('Approved')</span>
                                                        @else
                                                            @if ($log->status == '1')
                                                                <span class="badge badge--primary"><i
                                                                        class="las la-smile"></i> @lang('Pending')</span>
                                                            @else
                                                                <span class="badge badge--danger"><i
                                                                        class="las la-frown"></i> @lang('Reject')</span>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </td>
                                                <td><span>{{ $general->cur_sym }}{{ getAmount($log->amount) }}
                                                @if ($log->refund)
                                                    / {{ getAmount($log->refund) }}
                                                @endif
                                                </span> </td>
                                                <td>
                                                    @if ($log->winorloss == 'win')
                                                        <span class="badge badge--success"><i class="las la-smile"></i>
                                                            @lang('Win')</span>
                                                    @else
                                                        @if ($log->winorloss != 'loss')
                                                            <span class="badge badge--primary"><i class="las la-smile"></i>
                                                                @lang('Pending')</span>
                                                        @else
                                                            <span class="badge badge--danger"><i class="las la-frown"></i>
                                                                @lang('Lost')</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                @php
                                                    $details = $log != null ? json_encode($log) : null;
                                                @endphp

                                                <td>
                                                    <a class="btn
                                                     base--bg btn-sm 
                                                     
                                                     detailBtn "
                                                        href="javascript:void(0)" data-info="{{ $details }}"
                                                        {{-- @if ($deposit->status == Status::PAYMENT_REJECT)
                                                      data-admin_feedback="{{ $log }}" 
                                                      @endif --}}>
                                                        <i class="fa fa-desktop"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="100%">You have not Betting data!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($logs->hasPages())
                            <div class="card-footer">
                                {{ paginateLinks($logs) }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detailModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content section--bg">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Details')</h5>
                    <span class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush payment-list userData mb-2">
                    </ul>
                    <div class="feedback"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        (function($) {
            "use strict";
            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');

                var userData = $(this).data('info');
                var html = '';
                if (userData) {

                    if (userData.type != 'file') {
                        html +=
                            `<li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Match</span>
                                <span">${userData.betdata.t1} vs ${userData.betdata.t2}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Ratios</span>
                                <span">${userData.ratios} X</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Win Amount:</span>
                                <span">${userData.winamount} $</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Fee</span>
                                <span">${userData.betdata.fee} %</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Recieve amount</span>
                                <span">${(userData.winamount + userData.amount)-userData.fee } $</span>
                            </li>`

                        ;
                    }

                }

                modal.find('.userData').html(html);

                if ($(this).data('admin_feedback') != undefined) {
                    var adminFeedback = `
                        <div class="my-3">
                            <strong>@lang('Admin Feedback')</strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
                } else {
                    var adminFeedback = '';
                }

                modal.find('.feedback').html(adminFeedback);


                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
