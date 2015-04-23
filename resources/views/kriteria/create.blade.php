@extends('template.backend')

@section('content')
<h1>Tambah Karyawan Baru</h1>
<hr/>

	{!! Form::open(['url'=>'karyawan']) !!}

		@include('karyawan.form',['submitButtonText'=>'Tambah Karyawan'])
	
	{!! Form::close() !!}

	@include('errors.list')

@stop