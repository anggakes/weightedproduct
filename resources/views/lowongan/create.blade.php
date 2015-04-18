@extends('template.backend')

@section('content')
<h1>Tambah Lowongan Jabatan Baru</h1>
<hr/>

	{!! Form::open(['route'=>'lowongan.store']) !!}

		@include('lowongan.form',['submitButtonText'=>'Tambah Lowongan Jabatan'])
	
	{!! Form::close() !!}

	@include('errors.list')

@stop