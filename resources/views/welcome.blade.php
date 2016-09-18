@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Добро пожаловать!</div>

                <div class="panel-body">
                    <p>Это торговая платформа, созданная специально для студентов Харькова.</p>
                    <p>Здесь вы можете покупать и продавать вещи другим студентам, а так же просматривать 
                    последние новости нашего студ. городка.</p>
                    <img alt="" src="{{ URL::asset('img/welcome.jpg') }}" width="100%">
                    <h3>Последние товары:</h3>
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
