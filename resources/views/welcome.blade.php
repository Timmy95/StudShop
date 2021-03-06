@extends('layouts.app')

@section('content')

<div class="landing">
    <div class="container">
        <div class="wow fadeInDown">
            <img alt="" src="{{ URL::asset('img/landing.png') }}" id="landing-img">
        </div>

        <div class="row wow fadeInUp">
            <div class="col-lg-7 col-lg-offset-2 col-md-8 col-md-offset-1 col-sm-8 col-sm-offset-1 col-xs-8 col-xs-offset-2">
                <p>Посмотрите последние предложения от нашего магазина!</p>
            </div>
            <div class="col-lg-1 col-lg-offset-0 col-md-1 col-sm-1 col-sm-offset-1 col-xs-4 col-xs-offset-4">
                <a href="{{ url('/auctions') }}">
                    <input type="button" value="Купить" id="landing-btn">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="latest-auctions">
    <div class="container">
        <h2>Последние товары:</h2>
        <div class="row sl">
            @foreach($auctions as $auction)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInRight sl-slide">
                    <a href="{{ action('AuctionsController@show', [$auction->id]) }}">
                    <div class="box-auction">
                        <div class="slide-title">
                            <h3>{{ $auction->title }}</h3>
                        </div>
                            <h4 class="price">{{ $auction->price }} грн.</h4>

                            @if (!$auction->image)
                                <img src="{{ URL::asset('uploads/imageNotFound.jpg') }}" class="prod-img">
                            @else
                                <img src="{{ URL::asset($auction->image) }}" class="prod-img">
                            @endif
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
{!! Html::script('js/wow.min.js') !!}
{!! Html::script('js/slick.min.js') !!}
{!! Html::script('js/slider_settings.js') !!}
<script>
    new WOW().init();
</script>
@endsection
