@extends('template.backend')

@section('content')
<div class="panel panel-default " >
<div class="panel-heading">
    <h4>Edit Karyawan: {!! $karyawan->nik." - ".$karyawan->nama !!}</h4>
</div>

<div class="panel-body">
<div class='col-md-6'>
	{!! Form::model($karyawan, ['method'=>'PATCH','action'=>  ['KaryawanController@update',$karyawan->id]]) !!}
		
		@include('karyawan.form',['submitButtonText'=>'Ubah Karyawan'])
	
	{!! Form::close() !!}

	@include('errors.list')
</div>
</div></div>
@stop