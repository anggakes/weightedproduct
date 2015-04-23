@extends('template.backend')

@section('content')


<h3>Input Nilai Karyawan Periode {!! date('M')." ".date('Y') !!}</h3> <br>

{!! Form::open(['url'=>'penilaian','method'=>'post'])!!}
	
	@include ('penilaian.form')

{!! Form::submit("Simpan",['class'=>'btn btn-primary form-control']) !!}
{!! Form::close() !!}

@stop

@section('css')

<style type="text/css">
	.table td{
		text-align: center;
	}
	.table thead{
		text-align: center;
		color:#fff;
		background: blue;
	}
</style>

@stop