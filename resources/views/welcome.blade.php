@extends('layouts.app')

@section('content')
<div class="landing-container">
    <img alt="" src="{{ URL::asset('img/landing.png') }}" id="landing-img">
    <div id="landing-cta">
    <div><span>Посмотри последние предложения от нашего магазина!</span></div>
    <div>
    <a href="{{ url('/auctions') }}">
    	<input type="button" value="Купить" id="landing-btn">
    </a>
    </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Последние товары:</h3></div>

                <div class="panel-body">
                    
                    
                    <div class="container">
                    	<div class="row">
	                    @foreach($auctions as $auction)
	                    
	                    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	                    		<h4><a href="{{ action('AuctionsController@show', [$auction->id]) }}">{{ $auction->title }}</a></h4>
	                    		<h4 class="price">{{ $auction->price }} грн.</h4>
	                    		<a href="{{ action('AuctionsController@show', [$auction->id]) }}">
		                    		@if (!$auction->image)
										<img src="{{ URL::asset('uploads/imageNotFound.jpg') }}" class="prod-img">
									@else
										<img src="{{ URL::asset($auction->image) }}" class="prod-img">
									@endif
								</a>
	                    	</div>
	                    
	                    @endforeach
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
