@extends('template.backend')

@section('content')
<div class="panel panel-default " >
<div class="panel-heading">
    <h4>Tambah Karyawan Baru</h4>
</div>

<div class="panel-body">
<div class='col-md-6'>
	{!! Form::open(['url'=>'karyawan']) !!}

		@include('karyawan.form',['submitButtonText'=>'Tambah Karyawan'])
	
	{!! Form::close() !!}

	@include('errors.list')
</div>
</div></div>

@stop