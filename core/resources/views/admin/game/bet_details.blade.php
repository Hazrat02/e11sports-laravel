@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--md table-responsive">
                        <table class="table--light style--two table">
                            <thead>
                                <tr>
                                    <th>@lang('Team')</th>
                                    <th>@lang('Game')</th>
                                    <th>@lang('User')</th>
                                    <th>@lang('ID')</th>
                                    <th>@lang('Amount')</th>
                                    <th>@lang('Ratios')</th>
                                    <th>@lang('Win amount')</th>
                                    <th>@lang('Fee')</th>

                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($game_log as $bet)
                                        <tr>
                                            <td>
                                                
                                                    {{$bet->choose }} 
        
                                            </td>
                                            <td>
                                                {{ optional($bet->betdata)->game }}
                                                
                                                {{-- {{ $bet->betdata->game }} --}}
        
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
                                                {{ number_format($bet->ratios, 1) }} X

                                                
                                                {{-- {{ $bet->ratios  }} X --}}
        
                                            </td>
                                            
                                            <td>
                                             
                                                    {{ __($general->cur_sym) }}{{$bet->winamount }}  
                                                   
                                            </td>
                                            <td>
                                                {{ __($general->cur_sym) }}{{$bet->fee }}
                                            </td>
 
                                            <td>
                                                <a class="btn btn-sm btn-outline--primary" href="{{ route('admin.users.detail', $bet->user_id) }}">
                                                    <i class="las la-desktop"></i> @lang('Details')
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-muted text-center" colspan="100%">You have not any today Bet data!</td>
                                        </tr>
                                    @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($game_log->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($game_log) }}
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection


