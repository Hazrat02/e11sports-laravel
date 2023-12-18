@php
    $content = getContent('game.content', true);
    $games = \App\Models\Game::active()->get();
@endphp
<section class="pt-120 pb-120 section--bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">{{ __(@$content->data_values->heading) }}</h2>
                    <p class="mt-3">{{ __(@$content->data_values->subheading) }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-none-30">
            <div class="col-xl-3 col-lg-4 col-sm-6 mb-30 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
                <div class="game-card">
                    <div class="game-card__thumb">
                        <img style="height: 300px" src="https://wordpresscdn.winzogames.com/prod/blog/wp-content/uploads/2022/02/03075005/cricket.jpg" alt="image">
                    </div>
                    <div class="game-card__content">
                        <h4 class="game-name">Cricket</h4>
                        {{-- {{ route('/user/working') }} --}}
                        <a class="cmn-btn d-block btn-sm btn--capsule mt-3 text-center" href="{{ route('working') }}">@lang('Bet Now')</a>
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
                        <a class="cmn-btn d-block btn-sm btn--capsule mt-3 text-center" href="{{ route('working') }}">@lang('Bet Now')</a>
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
                            <a class="cmn-btn d-block btn-sm btn--capsule mt-3 text-center" href="{{ route('user.play.game', $game->alias) }}">@lang('Play Now')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
