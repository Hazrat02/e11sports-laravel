@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="pt-120 pb-120">
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
                                                        <span class="badge badge--success"><i class="las la-smile"></i> @lang('Approved')</span>
                                                    @else
                                                    @if ($log->status == '1')
                                                    <span class="badge badge--primary"><i class="las la-smile"></i> @lang('Pending')</span>
                                                @else
                                                    <span class="badge badge--danger"><i class="las la-frown"></i> @lang('Reject')</span>
                                                @endif
                                                    @endif
                                                    </div>
                                                </td>
                                                <td><span>{{ $general->cur_sym }}{{getAmount($log->amount) }}</span> </td>
                                                <td>
                                                    @if ($log->winorloss == 'win')
                                                        <span class="badge badge--success"><i class="las la-smile"></i> @lang('Win')</span>
                                                    @else
                                                    @if ($log->winorloss != 'loss')
                                                    <span class="badge badge--primary"><i class="las la-smile"></i> @lang('Pending')</span>
                                                @else
                                                    <span class="badge badge--danger"><i class="las la-frown"></i> @lang('Lost')</span>
                                                @endif
                                                    @endif
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
@endsection
