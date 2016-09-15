@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default inside-box">
            	<div class="row">
	            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h1>{{ $auction->title }}</h1>
						@if (!Auth::guest() && (Auth::user()->id == $auction->user_id || Auth::user()->moderator))
							<a href="{{ action('AuctionsController@edit', [$auction->id]) }}">[Редактировать описание]</a>
						@endif
					</div>
				</div>
					
            	<div class="row">
            		<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5">
						@if (!$auction->image)
							<img src="{{ URL::asset('uploads/imageNotFound.jpg') }}" width=100%>
						@else
							<img src="{{ URL::asset($auction->image) }}" width=100%>
						@endif
					</div>
					<div class="col-lg-1 col-md-1 col-sm-0 col-xs-0"></div>
					<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
						<p class="prod-title price">{{ $auction->price }} грн.</p>
						@unless ($auction->departments->isEmpty())
						<h4>Категории:</h4>
						<ul>
						@foreach($auction->departments as $department)
							<li>{{ $department->name }}</li>
						@endforeach
						</ul>
						@endunless
						<h4>О товаре:</h4>
						<article>
							{!! nl2br(e($auction->body)) !!}
						</article>
						<h4>Продавец: {{ $auction->user->name }}</h4>
						<h4>Телефон: {{ $auction->user->phone }}</h4>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>

@endsection