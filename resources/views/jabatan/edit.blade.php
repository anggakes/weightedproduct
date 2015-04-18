@extends('template.backend')

@section('content')
	<h1>Edit: {!! $jabatan->nama !!} </h1>
	{!! Form::model($jabatan, ['method'=>'PATCH','action'=> ['JabatanController@update',$jabatan->id]]) !!}
		
		@include('jabatan.form',['submitButtonText'=>'Simpan'])
	
	{!! Form::close() !!}

	@include('errors.list')
@stop

@section('js')
{!!Html::script("assets/select2/select2.min.js")!!}

<script type='text/javascript'>
  $('.multiple').select2();
</script> 
@stop
@section('css')
{!!Html::style("assets/select2/select2.min.css")!!} 
@stop