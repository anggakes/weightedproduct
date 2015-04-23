@extends('template.backend')

@section('content')
	<h1>Edit: {!! $karyawan->nik !!} </h1>
	{!! Form::model($karyawan, ['method'=>'PATCH','action'=>  ['KaryawanController@update',$karyawan->id]]) !!}
		
		@include('karyawan.form',['submitButtonText'=>'Ubah Karyawan'])
	
	{!! Form::close() !!}

	@include('errors.list')
@stop