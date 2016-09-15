@extends('layouts.app')

@section('content')

@if(Session::has('success'))
	<div class="alert-box success">
		<h2>{!! Session::get('success') !!}</h2>
	</div>
@endif
<div class="form-wrapper">
<div class="secure"><h2>Изменение описания товара: "{{ $auction->title }}"</h2></div>
{!! Form::model( $auction, array('action' => ['AuctionsController@update', $auction->id],'method'=>'PATCH', 'files'=>true)) !!}
	@include('auctions._form')
{!! Form::close() !!}

	@include('errors.errorlist')
</div>





@endsection