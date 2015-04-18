@extends('template.backend')

@section('content')
	<h1>Edit: {!! $lowongan->jabatan->nama !!} </h1>
	{!! Form::model($lowongan, ['method'=>'PATCH','action'=> ['LowonganController@update',$lowongan->id]]) !!}
		
		@include('lowongan.form',['submitButtonText'=>'Ubah Lowongan Jabatan'])
	
	{!! Form::close() !!}

	@include('errors.list')
@stop