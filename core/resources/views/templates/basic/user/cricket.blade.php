@extends($activeTemplate . 'layouts.master')
@section('content')
    <section class="mt-5 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">



                    @foreach ($game as $match)
                        <div class="contenedorEquipo">
                            <div class="base">

                                <div class="panel panel-superior">
                                    <div class="equipo-superior izquierdo"><img alt="nombreEquipo" class="float-izquierda"
                                            src="{{$match->t1_img}}">

                                        <div class="" style="position: absolute;top:0%;left:31%">
                                            <p class="com"><span >Commition : </span> <span style="color: #e176ce"> {{$match->fee}}%</span>
                                                @if ($match->isbet == '1')
                                                <p class="com"><span>Bet : </span> <span style="color: #32874a"> Runing</span>
                                                @else
                                                <p class="com"><span>Bet : </span> <span style="color: #be0439"> Stop</span>
                                                @endif 
                                            </div>

                                    </div>
                                    <div class="equipo-superior derecho"><img alt="nombreEquipo" class="float-derecha"
                                            src='{{$match->t2_img}}'>


                                    </div>
                                </div>
                                <div class="panel marcadores">
                                    <div class="equipo-marcador  izquierdo">
                                        <p class="float-izquierda com">{{$match->t1}}</p>

                                    </div>
                                    <div class="marcador-tiempo"><time>VS</time></div>
                                    <div class="equipo-marcador  derecho">
                                        <p class="com">{{$match->t2}}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">

                                    <div class="inferior-boton  float-izquierda"><a
                                            href="{{ route('user.play.cricketbet',$match->id) }}"><button>Bet Now</button></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="col-lg-6">
                    

                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>@lang('Match')</th>
                                            <th>@lang('Start Time')</th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($upcoming as $match)
                                            <tr>
                                                <td>
                                                    
                                                        {{$match->t1 }}  VS {{$match->t2 }}
            
                                                </td>
                                                <td>
                                                    {{ showDateTime($match->start) }}
                                                    
                                              
                                                </td>
                                                
                                                
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-muted text-center" colspan="100%">Upcoming data not found !</td>
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
        
    </section>

    <!-- Modal -->
   
@endsection

@push('style-lib')
    <link href="{{ asset($activeTemplateTrue . 'css/coinflipping.min.css') }}" rel="stylesheet">
@endpush
@push('script-lib')
    <script type="text/javascript" src="{{ asset($activeTemplateTrue . 'js/coin.js') }}"></script>
@endpush
@push('style')
    <style type="text/css">
        .contenedorEquipo {
            margin: 10px 0px 15px 0px;
        }

        .base {

            width: 90%;
            margin: 0px auto;
            box-shadow: 1px 1px 1px 1px black;
            border-radius: 10px;
            background: rgba(0, 0, 0, 1);
            overflow: hidden;
            border: 2px solid white;
            font-family: bebas, Verdana, Geneva, sans-serif;
            color: white;
            padding-bottom: 10px;
        }

        .panel {
            width: 100%;
            box-shadow: 0px 0px 0px 1px rgba(255, 255, 255, 1);
            background-color: rgba(0, 0, 0, 1);
            /* display: block; */
            /* float: left; */
            position: relative;
            top: 0px;
            height: 75px;
        }

        .equipo-superior {
            width: 50%;
            float: left;
            color: white;
            height: 100%;
            overflow: hidden;
        }

        .equipo-superior img {

            width: 100px;
            margin: 0px 20px;
        }

        .float-izquierda {
            float: left !important;
        }

        .float-derecha {
            float: right !important;
        }

        .panel-superior .izquierdo {
            background: linear-gradient(to right, rgba(255, 175, 75, 1) 0%, rgba(255, 146, 10, 0) 100%);
        }

        .panel-superior .izquierdo span {
            float: left;
        }

        .panel-superior .derecho span {
            float: right;
        }

        .panel-superior .derecho {
            background: linear-gradient(to right, rgba(30, 87, 153, 0) 0%, rgba(30, 87, 153, 1) 53%, rgba(30, 87, 153, 1) 100%);
        }

        .estadisticas p {
            height: 0px;
            font-size: 25px;
            margin-top: 5px;
        }

        .marcadores {
            width: 100%;
            position: relative;
            height: 60px;
            overflow: hidden;
            box-shadow: 0px 0px 0px 2px #fff;
        }

        .marcadores .derecho {
            background: rgba(30, 87, 153, 1);
            box-shadow: 0px 0px 0px 3px #000 inset, 0px 0px 25px 0px #000 inset;
            border-radius: 0px 10px 10px 0px;
        }

        .marcadores .izquierdo {
            background: rgb(179, 121, 48);
            box-shadow: 0px 0px 0px 3px #000 inset, 0px 0px 25px 0px #000 inset;
            border-radius: 10px 0px 0px 10px;
        }

        .marcadores div {
            float: left;
            height: 100%;
            line-height: 35px;
            text-align: center;
        }

        .marcadores div p {
            margin: 10px 0px 0px 5px;
            width: 60%;
            font-size: 24px;
        }

        .equipo-marcador {
            width: 40%;
        }

        .marcador-tiempo {
            width: 20%;
            font-size: 26px;

            line-height: 50px !important;
        }

        .marcador-tiempo time {
            line-height: 50px;
        }

        .marcador-goles {
            background: white;
            width: 25%;
            height: 40px !important;
            margin: 10px 5px;
            box-shadow: 0px 0px 0px 1px black;
            color: #000;
            line-height: 36px !important;
            text-align: center;
            font-size: 24px;
            /*margin-left: 33px;*/
        }

        .equipo-inferor {
            width: 20%;
            /* line-height: 38px; */
            /* vertical-align: middle; */
            text-align: center;
        }

        .imagen-estrella {
            width: 30px;
            margin: 20px 0px 0px 1px;
        }

        .inferior-boton {

            text-align: center;
        }

        .inferior-boton button {
            background-color: #e8065b;
            border: 2px solid #fff;
            border-radius: 30px;
            padding: 5px 15px;
            box-shadow: 0px 0px 10px 2px black inset;
            color: #fff;
            font-weight: 600;
            margin-top: 15px;
            font-size: 20px;
            transition: all 0.5s ease-out;
        }

        .inferior-boton button:hover {
            background-color: #e8065b;
            box-shadow: 0px 0px 3px 1px black inset;
        }

        .inferior-boton button:active {
            background-color: #e8065b;
            box-shadow: 0px 0px 0px 0px black inset;
        }

        .estadisticas {
            text-align: center;
        }

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            .com{
                font-size: 13px;
                font-family: bebas, Verdana, Geneva, sans-serif;
            }
            
            .base {
                width: 90%;
                margin: 0px auto;
                box-shadow: 1px 1px 1px 1px black;
                border-radius: 10px;
                background: rgba(0, 0, 0, 1);
                overflow: hidden;
                border: 2px solid white;
                font-family: bebas, Verdana, Geneva, sans-serif;
                color: white;
            }

            .panel {
                width: 100%;
                box-shadow: 0px 0px 0px 1px rgba(255, 255, 255, 1);
                background-color: rgba(0, 0, 0, 1);
                /* display: block; */
                /* float: left; */
                position: relative;
                top: 0px;
                height: 50px;
            }

            .equipo-superior {
                width: 50%;
                float: left;
                color: white;
                height: 100%;
                overflow: hidden;
            }

            .equipo-superior img {
                //max-width: 13vw;
                width: 60px;
                margin: 0px 10px;
            }

            .float-izquierda {
                float: left !important;
            }

            .float-derecha {
                float: right !important;
            }

            .panel-superior .izquierdo {
                background: linear-gradient(to right, rgba(255, 175, 75, 1) 0%, rgba(255, 146, 10, 0) 100%);
            }

            .panel-superior .izquierdo span {
                float: left;
            }

            .panel-superior .derecho span {
                float: right;
            }

            .panel-superior .derecho {
                background: linear-gradient(to right, rgba(30, 87, 153, 0) 0%, rgba(30, 87, 153, 1) 53%, rgba(30, 87, 153, 1) 100%);
            }

            .estadisticas p {
                height: 0px;
                font-size: 12px;
            }

            .marcadores {
                width: 100%;
                position: relative;
                height: 40px;
                overflow: hidden;
                box-shadow: 0px 0px 0px 2px #fff;
            }

            .marcadores .derecho {
                background: rgba(30, 87, 153, 1);
                box-shadow: 0px 0px 0px 3px #000 inset, 0px 0px 25px 0px #000 inset;
                border-radius: 0px 10px 10px 0px;
            }

            .marcadores .izquierdo {
                background: rgb(179, 121, 48);
                box-shadow: 0px 0px 0px 3px #000 inset, 0px 0px 25px 0px #000 inset;
                border-radius: 10px 0px 0px 10px;
            }

            .marcadores div {
                float: left;
                height: 100%;
                line-height: 35px;
                text-align: center;
            }

            .marcadores div p {
                margin: 0px 0px 0px 5px;

                width: 60%;
                font-size: 10px;
            }

            .equipo-marcador {
                width: 40%;
            }

            .marcador-tiempo {
                width: 20%;
                font-size: 16px;
                line-height: 35px !important;
            }

            .marcador-tiempo time {
                line-height: 35px !important;
            }



            .equipo-inferor {
                width: 33%;
                /* line-height: 38px; */
                /* vertical-align: middle; */
                text-align: center;
            }



            .imagen-estrella {
                width: 16px;
                margin: 15px 0px 0px 1px;
            }

            .inferior-boton {
                text-align: center;
            }

            .inferior-boton button {
                background-color: #e8065b;
                border: 2px solid #fff;
                border-radius: 30px;
                padding: 2px 15px;
                box-shadow: 0px 0px 10px 2px black inset;
                color: #fff;
                font-weight: 600;
                margin-top: 10px;
                transition: all 0.5s ease-out;
                font-size: 16px;
            }

            .inferior-boton button:hover {
                background-color: #e8065b;
                box-shadow: 0px 0px 3px 1px black inset;
            }

            .inferior-boton button:active {
                background-color: #e8065b;
                box-shadow: 0px 0px 0px 0px black inset;
            }

            .estadisticas {
                text-align: center;
            }
        }
    </style>
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
