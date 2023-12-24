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
                        @if (!empty($upcoming))
                            {{-- Loop through each match --}}
                            @foreach ($upcoming as $match)
                                <div class="col-12">
                                    <div class="row gy-4 mt-2">

                                        <div class="widget-two style--two box--shadow2 b-radius--5 bg--17">

                                            <div class="widget-two__content">
                                                <h6 class="text-white">{{ $match->t1 }}</h6>
                                                <p>VS</p>
                                                <h6 class="text-white">{{ $match->t2 }}</h6>
                                                <p class="text-white">@lang('Start : ') <Span
                                                        style="color: rgb(226, 218, 206)">
                                                        {{ $match->start }}</Span></p>
                                            </div>
                                            <a class="widget-two__btn" href="{{ route('admin.game.cricketinf', $match->id ) }}">@lang('Place in bet')</a>
                                        </div>


                                    </div>
                             
                                </div>
                                {{-- <div>
                                    <h2>{{ $match['name'] }}</h2>
                                    <p>ID: {{ $match['id'] }}</p>
                                    <p>Type: {{ $match['matchType'] }}</p>
                                    <p>Status: {{ $match['status'] }}</p>
                                </div> --}}
                            @endforeach
                        @else
                            <p>No Data !</p>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
    
    <button  class="btn btn-primary" data-bs-toggle="modal" type="button"  data-bs-target="#cronModal">Open Modal</button>

   
        <div class="modal fade " id="cronModal" role="dialog" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">@lang('Cron Job Setting Instruction')</h5>
                        <span class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></span>
                    </div>
                    <div class="modal-body">
                        <h3 class="text--danger text-center">@lang('Please Set Cron Job Now')</h3>
                        <p class="lead">
                            @lang('To complete all incomplete games, we need to set the cron job and make sure the cron job is running properly. Set the Cron time as minimum as possible. Once per 5-15 minutes is ideal while once every minute is the best option.') </p>

                        <label class="font-weight-bold">@lang('Cron Command')</label>
                        <div class="input-group">
                            <input class="form-control form-control-lg" id="referralURL" name="text" type="text" value="curl -s {{ route('cron') }}" readonly>
                            <span class="input-group-text copytext btn--primary copyBoard border-0" id="copyBoard"> @lang('Copy') </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.game.index') }}" />
@endpush
