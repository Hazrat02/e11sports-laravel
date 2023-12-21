@extends($activeTemplate . 'layouts.master')
@section('content')
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body h-100 middle-el">
                        <div class="alt"></div>
                        <div class="game-details-left">
                            <div class="game-details-left__body">
                                <div class="contenedorEquipo">
                                    <div class="base">
                                        <div class="panel panel-superior">
                                            <div class="equipo-superior izquierdo"><img alt="nombreEquipo"
                                                    class="float-izquierda"
                                                    src="
                                            https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Flag_of_Bangladesh.svg/1200px-Flag_of_Bangladesh.svg.png
                                            ">

                                                <div class="" style="position: absolute;top:0%;left:33%">
                                                    <p><span>Retio : </span> <span style="color: #93127b">2X</span></p>
                                                    <p><span>commition : </span> <span style="color: #93127b"> 10%</span>
                                                </div>

                                            </div>
                                            <div class="equipo-superior derecho"><img alt="nombreEquipo"
                                                    class="float-derecha"
                                                    src='
                                            https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Flag_of_Bangladesh.svg/1200px-Flag_of_Bangladesh.svg.png
                                            '>


                                            </div>
                                        </div>
                                        <div class="panel marcadores">
                                            <div class="equipo-marcador  izquierdo">
                                                <p class="float-izquierda">india</p>

                                            </div>
                                            <div class="marcador-tiempo"><time>VS</time></div>
                                            <div class="equipo-marcador  derecho">
                                                <p class="">Bangladesh</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">

                                            <div class="inferior-boton  float-izquierda"><a
                                                    href="{{ route('user.play.cricketbet') }}"><button>Bet Now</button></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cd-ft"></div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5">
                    <div class="game-details-right">
                        <form id="game" method="post">
                            @csrf
                            <h3 class="f-size--28 mb-4 text-center">@lang('Current Balance :') <span class="base--color"><span
                                        class="bal">{{ showAmount(auth()->user()->balance) }}</span>
                                    {{ __($general->cur_text) }}</span>
                            </h3>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input class="form-control amount-field" name="invest" type="text"
                                        value="{{ old('invest') }}" placeholder="@lang('Enter amount')">
                                    <span class="input-group-text" id="basic-addon2">{{ __($general->cur_text) }}</span>
                                </div>
                                <small class="form-text text-muted"><i class="fas fa-info-circle mr-2"></i>@lang('Minimum')
                                    : 20 {{ __($general->cur_text) }} | @lang('Maximum')
                                    : 40 {{ __($general->cur_text) }} | <span class="text--warning">@lang('Win Amount')

                                        {{-- @if ($game->invest_back == 1)
                                            {{ showAmount($game->win + 100) }}
                                        @else
                                            {{ showAmount($game->win) }}
                                        @endif --}}

                                        54%</span>
                                </small>
                            </div>
                            <div class="form-group justify-content-center d-flex mt-5">
                                <div class="single-select head gmimg">
                                    <img src="{{ asset($activeTemplateTrue . '/images/play/head.png') }}" alt="game-image">
                                </div>
                                <div class="single-select tail gmimg">
                                    <img src="{{ asset($activeTemplateTrue . '/images/play/tail.png') }}" alt="game-image">
                                </div>
                                <input name="choose" type="hidden">
                            </div>
                            <div class="mt-5 text-center">
                                <button class="cmn-btn w-100 game text-center" id="flip"
                                    type="submit">@lang('Play Now')</button>
                                <a class="game-instruction mt-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter">@lang('Game Instruction') <i
                                        class="las la-info-circle"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content section--bg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('Game Rule')</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    yfhgfhfghfghfghfghfghfhgfg
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style-lib')
    <link href="{{ asset($activeTemplateTrue . 'css/coinflipping.min.css') }}" rel="stylesheet">
@endpush
@push('script-lib')
    <script type="text/javascript" src="{{ asset($activeTemplateTrue . 'js/coin.js') }}"></script>
@endpush
@push('script')
    <script>
        "use strict";
        $('#game').on('submit', function(e) {
            e.preventDefault();
            $('.flipcoin').removeClass('animateClick');
            $('.flpng').removeClass('d-none');
            $('#coin .headCoin').addClass('d-none');
            $('#coin .tailCoin').addClass('d-none');

            $('.cmn-btn').html('<i class="la la-gear fa-spin"></i> Processing...');
            $('.cmn-btn').attr('disabled', true);
            var data = $(this).serialize();
            var url = "{{ route('user.play.game.invest', 'head_tail') }}";
            game(data, url);
        });

        function endGame(data) {
            var url = "{{ route('user.play.game.end', 'head_tail') }}";
            complete(data, url);
        }
    </script>
@endpush
