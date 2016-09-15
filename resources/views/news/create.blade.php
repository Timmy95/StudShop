@extends('layouts.app')

@section('content')

@if(Session::has('success'))
	<div class="alert-box success">
		<h2>{!! Session::get('success') !!}</h2>
	</div>
@endif
<div class="form-wrapper">
<div class="secure"><h2>Заполните форму</h2></div>
{!! Form::open(array('url'=>'news','method'=>'POST', 'files'=>true)) !!}
	<div class="form-group">
		{!! Form::label('title', 'Заголовок:') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>	
	
	<div class="form-group">
		{!! Form::label('body', 'Текст:') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Отправить', ['class' => 'btn btn-primary form-control']) !!}
	</div>
{!! Form::close() !!}
</div>



@endsection