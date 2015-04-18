@extends('template.backend')

@section('content')
<a href="{!! action('StepByStepController@getCoreSecondaryFactor',[$id_lowongan]
	)!!}" class='btn btn-primary pull-right'>Selanjutnya</a>
<h3>Step By Step Convert Gap Bobot</h3>
<hr>
<!-- ================================================================ -->
<center><h3>Nilai KI </h3></center><br> 
<table class='table'>
<thead style='background:#c0c0c0'>
<tr>
<td>No</td>
<td>Nama Karyawan</td>
<td>KI01</td>
<td>KI02</td>
<td>KI03</td>
<td>KI04</td>
<td>KI05</td>
</tr>
</thead>
<tbody>
<?php $i=1; ?>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $value->karyawan->nama !!}</td>
	@foreach ($data['ki'][$key] as $n) 
		<td>{!! $n !!}</td>
	@endforeach
</tr> 
@endforeach

</tbody>
</table>

<!-- ================================================================ -->
<center><h3>Nilai KP </h3></center><br> 
<table class='table'>
<thead style='background:#c0c0c0'>
<tr>
<td>No</td>
<td>Nama Karyawan</td>
<td>KP01</td>
<td>KP02</td>
<td>KP03</td>
</tr>
</thead>
<tbody>
<?php $i=1; ?>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $value->karyawan->nama !!}</td>
	@foreach ($data['kp'][$key] as $n) 
		<td>{!! $n !!}</td>
	@endforeach
</tr> 
@endforeach
</tbody>
</table>

<!-- ================================================================ -->
<center><h3>Nilai KT </h3></center><br> 
<table class='table'>
<thead style='background:#c0c0c0'>
<tr>
<td>No</td>
<td>Nama Karyawan</td>
<td>KT01</td>
<td>KT02</td>
</tr>
</thead>
<tbody>
<?php $i=1; ?>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $value->karyawan->nama !!}</td>
	@foreach ($data['kt'][$key] as $n) 
		<td>{!! $n !!}</td>
	@endforeach
</tr> 
@endforeach

</tbody>
</table>
@stop