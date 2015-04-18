@extends('template.backend')

@section('content')
<h1>Tambah Jabatan</h1>
<hr/>

	{!! Form::open(['route'=>'jabatan.store','class'=>'form-horizontal']) !!}

		@include('jabatan.form',['submitButtonText'=>'Tambah'])
	
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