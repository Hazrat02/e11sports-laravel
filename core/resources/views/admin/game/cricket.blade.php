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
                                            <a class="widget-two__btn"
                                                href="{{ route('admin.game.cricketinf', $match->id) }}">@lang('Place in bet')</a>
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




    <div class="modal fade " id="cronModal" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('Create Cricket Games')</h5>
                    <span class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></span>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Team A Name')</label>
                                        <input class="form-control" name="t1" type="text" value=""
                                            placeholder="@lang('Bangladesh')" required>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Team B Name')</label>
                                        <input class="form-control" name="t2" type="text" value=""
                                            placeholder="@lang('India')" required>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Team B Name')</label>
                                        <input class="form-control" name="t2" type="text" value=""
                                            placeholder="@lang('India')" required>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">

                                        <label>@lang('Minimum Invest Amount')</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" name="min" type="number" value=""
                                                step="any" min="1" placeholder="@lang('Minimum Invest Amount')" required>
                                            <span class="input-group-text" id="basic-addon2">{{ $general->cur_sym }}</span>
                                        </div>
                                        <label>@lang('Minimum Invest Amount')</label>
                                        <input class="form-control" name="min" type="number" value=""
                                            placeholder="@lang('Minimum Invest Amount')" required>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Maximum Invest Amount')</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" name="max" type="number" value=""
                                                step="any" min="1" placeholder="@lang('Maximum Invest Amount')" required>
                                            <span class="input-group-text"
                                                id="basic-addon2">{{ $general->cur_sym }}</span>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Commission fee')</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" name="fee" type="number" value=""
                                                placeholder="@lang('Commission fee')">
                                            <span class="input-group-text" id="basic-addon2">@lang('%')</span>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="mt-3">
                                <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <button class="btn btn-outline--info" data-bs-toggle="modal" type="button" data-bs-target="#cronModal">+ Add
        Game</button>
@endpush
