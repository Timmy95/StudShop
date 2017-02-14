@extends('layouts.app')

@section('content')


<div class="container custom-top-margin">
@foreach($auctions as $auction)

		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
				@if (!$auction->image)
					<a href="{{ action('AuctionsController@show', [$auction->id]) }}">
					<img src="{{ URL::asset('uploads/imageNotFound.jpg') }}" class="prod-img"></a>
				@else
					<a href="{{ action('AuctionsController@show', [$auction->id]) }}">
					<img src="{{ URL::asset($auction->image) }}" class="prod-img"></a>
				@endif
			</div>
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
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
	{{ $auctions->render() }}
@endif
</div>
@endsection