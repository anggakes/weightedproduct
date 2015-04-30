@extends('template.backend')

@section('content')

<div class="panel panel-default" >
<div class="panel-heading">
		<h4>Input Nilai</h4>
</div>

<div class="panel-body">

{!! Form::open(['url'=>'penilaian/input','method'=>'post'])!!}
	
	@include ('penilaian.form')

{!! Form::submit("Simpan",['class'=>'btn btn-primary form-control']) !!}
{!! Form::close() !!}

				</div>
			</div><!-- end panel -->
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