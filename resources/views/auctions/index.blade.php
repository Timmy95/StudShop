@extends('layouts.app')

@section('content')


<div class="container custom-top-margin">
@foreach($auctions as $auction)

		<div class="row">
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
				@if (!$auction->image)
					<a href="{{ action('AuctionsController@show', [$auction->id]) }}">
					<img src="{{ URL::asset('uploads/imageNotFound.jpg') }}" class="prod-img"></a>
				@else
					<a href="{{ action('AuctionsController@show', [$auction->id]) }}">
					<img src="{{ URL::asset($auction->image) }}" class="prod-img"></a>
				@endif
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-0"></div>
			<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
				<p class="prod-title">
					<a href="{{ action('AuctionsController@show', [$auction->id]) }}">{{ $auction->title }}</a>
				</p>
				<p class="prod-title price">
					{{ $auction->price }} грн.
				</p>
				<div>{!! nl2br(e($auction->body)) !!}</div>
			</div>
		</div>
		<hr>
@endforeach
@if($auctions instanceof Illuminate\Pagination\LengthAwarePaginator)
	<div class="render-nav">
		{{ $auctions->render() }}
	</div>
@endif
</div>
@endsection