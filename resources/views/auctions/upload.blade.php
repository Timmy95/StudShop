@extends('layouts.app')

@section('content')
<div class="about-section">
   <div class="text-content">
     <div class="span7 offset1">
        @if(Session::has('success'))
          <div class="alert-box success">
          <h2>{!! Session::get('success') !!}</h2>
          
          @if (session()->has('fileName'))
          	<img alt="image" src="{!! Session::get('fileName') !!}" width="300">
          @else
          	<h2>Файл не найден</h2>
          @endif
          </div>
        @endif
        <div class="secure"><h2>Разместить товар</h2></div>
        {!! Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) !!}
         <div class="control-group">
         	<div class="form-group">
				{!! Form::label('title', 'Название:') !!}
				{!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('body', 'Описание:') !!}
				{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
			</div>	
          <div class="controls">
          {!! Form::file('image', array('class'=>'btn btn-default btn-file')) !!}
      <p class="errors">{!!$errors->first('image')!!}</p>
    @if(Session::has('error'))
    <p class="errors">{!! Session::get('error') !!}</p>
    @endif
        </div>
        </div>
        <div id="success"> </div>
      {!! Form::submit('Submit', array('class'=>'btn btn-default')) !!}
      {!! Form::close() !!}
      </div>
   </div>
</div>
@endsection