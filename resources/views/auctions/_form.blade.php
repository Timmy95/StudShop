<div class="form-group">
	{!! Form::label('title', 'Название:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>	
	
<div class="form-group">
	{!! Form::label('body', 'Описание:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
	
<div class="form-group">
	{!! Form::label('price', 'Цена:') !!}
	{!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>
	
<div class="form-group">
	{!! Form::label('image', 'Фото:') !!}
	{!! Form::file('image', ['class' => 'form-control filestyle']) !!}
</div>

<div class="form-group">
	{!! Form::label('departmentList', 'Категории:') !!}
	{!! Form::select('departmentList[]', $departments, null, ['id' => 'dep_list', 'class' => 'form-control', 'multiple']) !!}
</div>
	
<div class="form-group">
	{!! Form::submit('Отправить', ['class' => 'btn btn-primary form-control']) !!}
</div>

<script type="text/javascript">

	$('select').select2();
	$(':file').filestyle({buttonBefore: true});

</script>