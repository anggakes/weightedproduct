@extends('template.backend')

@section('content')


<h3>Edit Nilai</h3> <br>

{!! Form::open(['url'=>'penilaian/input','method'=>'post'])!!}
	
	@include ('penilaian.editform')

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