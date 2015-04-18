@extends('template.backend')

@section('content')
<a href="{!! action('StepByStepController@getTotalKompetensi',[$id_lowongan]
	)!!}" class='btn btn-primary pull-right'>Selanjutnya</a>
<h3>Step By Step Core & Secondary Factor</h3>
<hr>

<table class='table table-bordered'>
<thead>
	<tr>
	<td rowspan=2>Nama Karyawan</td>
	<td colspan=2>Kompetensi Inti</td>
	<td colspan=2>Kompetensi Kepemimpinan</td>
	<td colspan=2>Kompetensi Teknis</td>
	</tr>
	<tr>
		<td>core 1</td>
		<td>sec 1</td>
		<td>core 2</td>
		<td>sec 2</td>
		<td>core 3</td>
		<td>sec 3</td>
	</tr>
</thead>

<tbody>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $value->karyawan->nama !!}</td>
	<td>{!! round($data['ki'][$key]['cf'],2) !!}</td>
	<td>{!!  round($data['ki'][$key]['sf'],2) !!}</td>
	<td>{!!  round($data['kp'][$key]['cf'],2) !!}</td>
	<td>{!!  round($data['kp'][$key]['sf'],2) !!}</td>
	<td>{!!  round($data['kt'][$key]['cf'],2) !!}</td>
	<td>{!!  round($data['kt'][$key]['sf'],2) !!}</td>
</tr> 
@endforeach
</tbody>
</table>
@stop