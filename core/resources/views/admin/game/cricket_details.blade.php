@extends('admin.layouts.app')

@section('panel')








<div class="row">
    <div class="col-12">
        @php
        $t1_need_invest=$teamBsuccess->sum('winamount')-$teamAsuccess->sum('amount');
        $t2_need_invest=$teamAsuccess->sum('winamount')-$teamBsuccess->sum('amount');
    @endphp
        <div class="row gy-4">


            <div class="col-xxl-3 col-sm-6">
                <div class="widget-two style--two box--shadow2 b-radius--5 bg--19">
                    <div class="widget-two__icon b-radius--5 bg--primary">
                        <i class="las la-money-bill-wave-alt"></i>
                    </div>
                    <div class="widget-two__content">
                        <h3 class="text-white">{{ $general->cur_sym }}{{ $teamAsuccess->sum('amount') }}</h3>
                        <p class="text-white">@lang('Team A - '){{$game->t1}} Invest</p>
                  
                        @if ($t1_need_invest > '0')
                        <p class="text-danger">need more invest = {{$t1_need_invest}} $</p>
                        @endif
                        
                    </div>
                    
                </div>
            </div>

            <div class="col-xxl-3 col-sm-6">
                <div class="widget-two style--two box--shadow2 b-radius--5 bg--primary">
                    <div class="widget-two__icon b-radius--5 bg--primary">
                        <i class="las la-wallet"></i>
                    </div>
                    <div class="widget-two__content">
                        <h3 class="text-white">{{ $general->cur_sym }}{{ $teamBsuccess->sum('amount') }}</h3>
                       
                        <p class="text-white">@lang('Team B - '){{$game->t2}} Invest</p>
                        @if ($t2_need_invest > '0')
                        <p class="text-danger">need more invest = {{$t2_need_invest}} $</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-sm-6">
                <div class="widget-two style--two box--shadow2 b-radius--5 bg--1">
                    <div class="widget-two__icon b-radius--5 bg--primary">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="widget-two__content">
                        <h3 class="text-white">{{ $general->cur_sym }}{{ $teamAsuccess->sum('winamount') }}</h3>
                        <p class="text-white">@lang('Team A ')- Win Amount</p>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-sm-6">
                <div class="widget-two style--two box--shadow2 b-radius--5 bg--17">
                    <div class="widget-two__icon b-radius--5 bg--primary">
                        <i class="las la-gamepad"></i>
                    </div>
                    <div class="widget-two__content">
                        <h3 class="text-white">{{ $general->cur_sym }}{{ $teamBsuccess->sum('winamount') }}</h3>
                        <p class="text-white">@lang('Team B ')- Win Amount</p>
                    </div>
                </div>
            </div>

            

        </div>

        <div class="d-flex mt-4 flex-wrap gap-3">
            
            <div class="flex-fill">
                <button class="btn btn--success btn--shadow w-100 btn-lg bal-btn" data-bs-toggle="modal" data-bs-target="#addSubModal" data-act="add">
                    <i class="las la-plus-circle"></i> @lang('Ratios Change')
                </button>
            </div>
            <div class="flex-fill">
                @if ($game->isbet == '1')
                <a class="btn btn--primary btn--gradi btn--shadow w-100 btn-lg" href="{{ route('admin.game.isbet', ['id' => $game->id, 'status' => '2']) }}" >
                    <i class="las la-sign-in-alt"></i>@lang('Stop Bet')
                </a>
                @else
                <a class="btn btn--primary btn--gradi btn--shadow w-100 btn-lg" href="{{ route('admin.game.isbet', ['id' => $game->id, 'status' => '1']) }}" >
                    <i class="las la-sign-in-alt"></i>@lang('Start Bet')
                </a>
                @endif
                
            </div>
            <div class="flex-fill">
                <button class="btn btn--success btn--shadow w-100 btn-lg bal-btn" data-bs-toggle="modal" data-bs-target="#entModal" data-act="add">
                    <i class="las la-plus-circle"></i> @lang('Clear Pay & End')
                </button>
            </div>

          
        </div>

        <div class="card mt-30">
            <div class="card-header">
                <h5 class="card-title mb-0">@lang('Information of') Bet</h5>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card b-radius--10">
                        <div class="card-body p-0">
                            <div class="table-responsive--md table-responsive">
                                <table class="table--light style--two table">
                                    <thead>
                                        <tr>
                                        <th>@lang('Team')</th>
                                        <th>@lang('User')</th>
                                        <th>@lang('ID')</th>
                                        <th>@lang('Amount')</th>
                                        <th>@lang('Ratios')</th>
                                        <th>@lang('Win amount')</th>
                                        <th>@lang('Fee')</th>
                                        <th>@lang('Status')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($gamelog as $bet)
                                        <tr>
                                            <td>
                                                
                                                    {{$bet->choose }} 
        
                                            </td>
                                            <td>
                                                
                                                    {{$bet->user->fullname }} 
        
                                            </td>
                                            <td>
                                                
                                                    {{$bet->user_id }} 
        
                                            </td>
                                            <td>
                                                
                                                {{ __($general->cur_sym) }} {{ $bet->amount  }}
        
                                            </td>
                                            
                                            <td>
                                                
                                                {{ $bet->ratios  }} X
        
                                            </td>
                                            
                                            <td>
                                             
                                                    {{ __($general->cur_sym) }}{{$bet->winamount }}  
                                                   
                                            </td>
                                            <td>
                                                {{ __($general->cur_sym) }}{{$bet->fee }}
                                            </td>
 
                                            <td>
                                               
                                                @if ($bet->status == '1')
                                                <div class="d-flex justify-content-evenly">
                                                    <a style="color: rgb(146, 9, 9)"  href="{{ route('admin.game.gamestatus', ['id' => $bet->id, 'status' => '3']) }}"><i class="fa fa-window-close"></i></a>

                                                    <a style="color: rgb(23, 167, 50)"  href="{{ route('admin.game.gamestatus', ['id' => $bet->id, 'status' => '2']) }}"><i class="fa fa-check"></i></a>
                                                    <a style="color: rgb(23, 126, 167)" data-bs-toggle="modal" type="button" data-bs-target="#manualModal" data-user-id="{{ $bet->id }}" ><i class="fa fa-pencil-square-o"></i></a>
                                                </div>
                                                    
                                                @else
                                                    @if ($bet->status == '2')
                                                    <span class="btn btn-success">Success</span>
                                                    @else
                                                    <span class="btn btn-danger">Rejected</span>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-muted text-center" colspan="100%">You have not any Bet data!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Add Sub Balance MODAL --}}
<div class="modal fade" id="addSubModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="type"></span> <span>@lang('Change Ratios')</span></h5>
                <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{route('admin.game.ratios')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        
                        
                        <div class="col-12">
                            <div class="form-group">
                                <label>@lang('Ratio')</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" name="ratio_x" type="text" value=""
                                        placeholder="@lang('Enter Ratio')">
                                    <span class="input-group-text" id="basic-addon2">@lang('X')</span>
                                </div>
                            </div>

                        </div>
                        <div class=" col-12">
                            <div class="form-group">
                                <label>@lang('Ratio For')</label>
                                <select class="form-control" name="ratios">
                                    <option selected
                                     value="1">
                                        Team A
                                    </option>
                                    <option value="2">
                                        Team B
                                    </option>
                                </select>
                               
                            </div>

                        </div>


                    </div>
                    <input type="hidden" name="game_id" value="{{$game->id}}">

                    <div class="mt-3">
                        <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="entModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="type"></span> <span>@lang('Game End')</span></h5>
                <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{route('admin.game.betend')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        
                     
                        <div class="col-12">
                            <div class="form-group">
                                <label>@lang('Team Win')</label>
                                <select class="form-control" name="win">
                                    <option selected
                                     value="{{$game->t1}}">
                                        {{$game->t1}}
                                    </option>
                                    <option value="{{$game->t2}}">
                                        {{$game->t2}}
                                    </option>
                                </select>
                               
                            </div>

                        </div>
                        <input type="hidden" name="game_id" value="{{$game->id}}">


                    </div>

                    <div class="mt-3">
                        <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="manualModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span class="type"></span> <span>@lang('Manual invest approve')</span></h5>
                <button class="close" data-bs-dismiss="modal" type="button" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{route('admin.game.betend')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        
                     
                        <div class="col-12">
                            <div class="form-group">
                                <label>@lang('Approve amount')</label>
                                <input class="form-control" type="text" name="manual" />
                                    
                            
                               
                            </div>

                        </div>
                        <input type="hidden" name="user_id" value="">


                    </div>

                    <div class="mt-3">
                        <button class="btn btn--primary w-100 h-45" type="submit">@lang('Submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade " id="updateModal" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('Update Games')</h5>
                <span class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></span>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.game.betupdate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>@lang('Team A Name')</label>
                                    <input class="form-control" name="t1" type="text" value="{{$game->t1}}"
                                        placeholder="@lang('Bangladesh')" required>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>@lang('Team B Name')</label>
                                    <input class="form-control" name="t2" type="text" value="{{$game->t2}}"
                                        placeholder="@lang('India')" required>
                                </div>

                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">

                                    <label>@lang('Minimum Invest Amount')</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" name="min" type="number" value="{{$game->min}}"
                                            step="any" min="1" placeholder="@lang('Minimum Invest Amount')" required>
                                        <span class="input-group-text" id="basic-addon2">{{ $general->cur_sym }}</span>
                                    </div>
                                   
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>@lang('Maximum Invest Amount')</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" name="max" type="number" value="{{$game->max}}"
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
                                        <input class="form-control" name="fee" type="number" value="{{$game->fee}}"
                                            placeholder="@lang('Commission fee')">
                                        <span class="input-group-text" id="basic-addon2">@lang('%')</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>@lang('Team A Image')</label>
                                    <input class="form-control" name="t1_img" type="file" value=""
                                         >
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>@lang('Team B Image')</label>
                                    <input class="form-control" name="t2_img" type="file" value=""
                                         >
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>@lang('Game Type')</label>
                                    <input class="form-control" name="type" type="text" placeholder="IPL" value="{{$game->type}}"
                                         required>
                                </div>

                            </div>
                            <input type="hidden" name="game_id" value="{{$game->id}}">


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

@push('script')


<script>
    $(document).ready(function () {
        // Assuming you're using jQuery and Bootstrap
        $('#manualModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var user_id = button.data('user-id');

            // Set the value of the hidden input
            $('#manualModal').find('input[name="user_id"]').val(user_id);
        });
    });
</script>

@endpush
@push('breadcrumb-plugins')
    <button class="btn btn-outline--info" data-bs-toggle="modal" type="button" data-bs-target="#updateModal">Update
        Game</button>
@endpush