@extends($activeTemplate . 'layouts.frontend')
@section('content')

<section class="pt-120 pb-120 section--bg">
    <div class="container">
        <div class="row justify-content-center mb-none-30">
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="game-card">
                    <div class="game-card__thumb">
                        <img style="height: 300px" src="https://wordpresscdn.winzogames.com/prod/blog/wp-content/uploads/2022/02/03075005/cricket.jpg" alt="image">
                    </div>
                    <div class="game-card__content">
                        <h4 class="game-name">Cricket</h4>
                        {{-- {{ route('user.play.game', $game->alias) }} --}}
                        <a class="cmn-btn d-block btn-sm btn--capsule mt-3 text-center" href="">@lang('Bet Now')</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="game-card">
                    <div class="game-card__thumb">
                        <img style="height: 300px" src="https://m.media-amazon.com/images/I/81rW4NucmhL.png" alt="image">
                    </div>
                    <div class="game-card__content">
                        <h4 class="game-name">FootBall</h4>
                        {{-- {{ route('user.play.game', $game->alias) }} --}}
                        <a class="cmn-btn d-block btn-sm btn--capsule mt-3 text-center" href="">@lang('Bet Now')</a>
                    </div>
                </div>
            </div>
            @foreach ($games as $game)
                <div class="col-xl-3 col-lg-4 col-sm-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                    <div class="game-card">
                        <div class="game-card__thumb">
                            <img src="{{ getImage(getFilePath('game') . '/' . $game->image, getFileSize('game')) }}" alt="image">
                        </div>
                        <div class="game-card__content">
                            <h4 class="game-name">{{ __($game->name) }}</h4>
                            {{-- {{ route('user.play.game', $game->alias) }} --}}
                            <a class="cmn-btn d-block btn-sm btn--capsule mt-3 text-center" href="">@lang('Play Now')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

    @if ($sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include($activeTemplate . 'sections.' . $sec)
        @endforeach
    @endif
@endsection
