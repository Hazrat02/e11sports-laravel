@extends('admin.layouts.app')
@section('panel')
    <div class="col-12">
        <div class="">
            <div class="row justify-content-between ">
                <div class="col-md-6 col-12 card pt-1 pb-3">
                    <h3>Betting games</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="row gy-4 mt-2">
                    
                                <div class="">
                                    <div class="widget-two style--two box--shadow2 b-radius--5 bg--19">
                                        <div class="widget-two__icon b-radius--5 bg--primary">
                                            <i class="las la-money-bill-wave-alt"></i>
                                        </div>
                                        <div class="widget-two__content">
                                            <h3 class="text-white">7657</h3>
                                            <p class="text-white">@lang('Balance')</p>
                                        </div>
                                        <div>
                                            <a class="widget-two__btn" href=""> details</a>
                                            <a class="widget-two__btn" href=""> Stop Bet</a>
                                            <a class="widget-two__btn" href=""> Clear Pay</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-5 col-12 card">
                    upcoming
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.game.index') }}" />
@endpush
