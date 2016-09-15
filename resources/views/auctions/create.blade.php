@extends('layouts.app')

@section('content')

@if(Session::has('success'))
	<div class="alert-box success">
		<h2>{!! Session::get('success') !!}</h2>
	</div>
@endif
<div class="form-wrapper">
<div class="secure"><h2>Заполните форму</h2></div>
	{!! Form::open(array('url'=>'auctions','method'=>'POST', 'files'=>true)) !!}
		@include('auctions._form')
	{!! Form::close() !!}

	@include('errors.errorlist')
</div>




@endsection