@extends('admin.layouts.app')
@section('panel')

    <div class="d-flex mt-4 flex-wrap gap-3">
            
        <div class="flex-fill">
            <a class="btn btn--success btn--gradi btn--shadow w-100 btn-lg" href="{{ route('admin.game.cricket', ['status' => '2']) }}" >
                <i class="las la-sign-in-alt"></i>@lang('Betting')
            </a>
        </div>
        <div class="flex-fill">
 
            <a class="btn btn--primary btn--gradi btn--shadow w-100 btn-lg" href="{{ route('admin.game.cricket', ['status' => '1']) }}" >
                <i class="las la-sign-in-alt"></i>@lang('Upcoming')
            </a>
       
            
        </div>
        <div class="flex-fill">
            <a class="btn btn--secondary btn--gradi btn--shadow w-100 btn-lg" href="{{ route('admin.game.cricket', ['status' => '3']) }}" >
                <i class="las la-sign-in-alt"></i>@lang('Success')
            </a>
        </div>

      
    </div>

    <div class="card mt-30">
        <div class="card-header">
            <h5 class="card-title mb-0">@lang('Information of') {{$inf}}
                
         </h5>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card b-radius--10">
                    <div class="card-body p-0">
                        <div class="table-responsive--md table-responsive">
                            <table class="table--light style--two table">
                                <thead>
                                    <tr>
                                    <th>@lang('match')</th>
                                    <th>@lang('Min')</th>
                                    <th>@lang('Max')</th>
                                    <th>@lang('T1 Ratios')</th>
                                    <th>@lang('T2 Ratios')</th>
                                    @if ($inf == 'Upcoming Game')
                                        
                                    <th>@lang('Start')</th>
                                        
                                    @endif
                                    <th>@lang('Fee')</th>
                                    <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($game as $bet)
                                    <tr>
                                        <td>
                                            
                                                {{$bet->t1 }} vs {{$bet->t2}}
    
                                        </td>
                                        <td>
                                            
                                            {{ __($general->cur_sym) }} {{ $bet->min  }}
    
                                        </td>
                                        <td>
                                            
                                            {{ __($general->cur_sym) }} {{ $bet->max  }}
    
                                        </td>
                                        
                                        <td>
                                            {{ number_format($bet->t1_ratio, 1) }} X

                                            
                                            {{-- {{ $bet->t1_ratio  }} X --}}
    
                                        </td>
                                        <td>
                                            {{ number_format($bet->t2_ratio, 1) }} X

                                            
                                            {{-- {{ $bet->t2_ratio  }} X --}}
    
                                        </td>
                                        @if ($inf == 'Upcoming Game')
                                        
                                        <td>
                                            
                                            {{ $bet->start  }}
    
                                        </td>
                                        
                                    @endif
                                        
                                       
                                        <td>
                                            {{$bet->fee }}%
                                        </td>

                                        <td>
                                            @if ($bet->status == '1')
                                            <a class="btn btn-sm btn-outline--primary" href="{{ route('admin.game.betstatus', ['id' => $bet->id, 'status' => '2']) }}">
                                                <i class="las la-hand-pointer"></i> @lang('place in Bet')
                                            </a>
                                            <a class="btn btn-sm btn-outline--primary" href="{{ route('admin.game.gamedelete',$bet->id) }}">
                                                <i class="las la-hand-pointer"></i> @lang('Delete')
                                            </a>
                                            @else
                                            <a class="btn btn-sm btn-outline--primary" href="{{route('admin.game.cricketinf',$bet->id)}}">
                                                <i class="las la-desktop"></i> @lang('Details')
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">You have not any {{$inf}} data!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($game->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($game) }}
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade " id="cronModal" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('Create ') {{$inf}}</h5>
                    <span class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></span>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.game.betstore')}}" method="POST" enctype="multipart/form-data">
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

                                        <label>@lang('Minimum Invest Amount')</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" name="min" type="number" value=""
                                                step="any" min="1" placeholder="@lang('Minimum Invest Amount')" required>
                                            <span class="input-group-text" id="basic-addon2">{{ $general->cur_sym }}</span>
                                        </div>
                                       
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
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Team A Image')</label>
                                        <input class="form-control" name="t1_img" type="file" value=""
                                             required>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Team B Image')</label>
                                        <input class="form-control" name="t2_img" type="file" value=""
                                             required>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Game Type')</label>
                                        <input class="form-control" name="type" type="text" placeholder="IPL" value=""
                                             required>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Place In')</label>
                                        <select class="form-control" name="status">
                                            <option selected
                                             value="1">
                                                Upcoming
                                            </option>
                                            <option value="2">
                                                Betting
                                            </option>
                                        </select>
                                       
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Match Start')</label>
                                        
                                        <input class="form-control" name="start" type="datetime-local" 
                                        required>
                                        <input class="form-control" name="game" type="hidden" value="cricket" 
                                        >
                                    </div>

                                </div>
                                
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>@lang('Ratio')</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" name="ratio_x" type="text" value=""
                                                placeholder="@lang('Enter Ratio')">
                                            <span class="input-group-text" id="basic-addon2">@lang('X')</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-12">
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
