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
                    
                            
                                    <div class="widget-two style--two box--shadow2 b-radius--5 bg--19">
                                        <div class="widget-two__icon b-radius--5 bg--primary">
                                            <i class="las la-money-bill-wave-alt"></i>
                                        </div>
                                        <div class="widget-two__content">
                                            <h3 class="text-white">Bangladesh</h3>
                                            <p class="text-white">@lang('VS')</p>
                                            <h3 class="text-white">India</h3>
                                        </div>
                                        <div>
                                            <a class="widget-two__btn" href=""> Details</a>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="widget-two style--two box--shadow2 b-radius--5 bg--19">
                                        <div class="widget-two__icon b-radius--5 bg--primary">
                                            <i class="las la-money-bill-wave-alt"></i>
                                        </div>
                                        <div class="widget-two__content">
                                            <h3 class="text-white">Bangladesh</h3>
                                            <p class="text-white">@lang('VS')</p>
                                            <h3 class="text-white">India</h3>
                                        </div>
                                        <div>
                                            <a class="widget-two__btn" href=""> Details</a>
                                            
                                        </div>
                                        
                                    </div>
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-5 col-12 card pt-1 pb-3">
                    <h3>upcoming games</h3>
                    <div class="row">
                        <div class="col-12">
                            <div class="row gy-4 mt-2">
                    
                                <div class="widget-two style--two box--shadow2 b-radius--5 bg--17">
                              
                                    <div class="widget-two__content">
                                        <h5 class="text-white">Bangladesh vs India</h5>
                                        <p class="text-white">@lang('Start : ') <Span style="color: rgb(226, 218, 206)"> 05/12/2023 5h7g7h</Span></p> 
                                    </div>
                                    <a class="widget-two__btn" href="#">@lang('Place in bet')</a>
                                </div>
                                   
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
              
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.game.index') }}" />
@endpush
