@extends('template.backend')

@section('content')
<h1>Tambah Kriteria Baru</h1>
<hr/>

	{!! Form::open(['url'=>'kriteria']) !!}

		@include('kriteria.form',['submitButtonText'=>'Tambah Kriteria'])
	
	{!! Form::close() !!}

	@include('errors.list')

@stop