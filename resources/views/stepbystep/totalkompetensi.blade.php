@extends('template.backend')

@section('content')
<a href="{!! route('lowongan.show',$id_lowongan)!!}" class='btn btn-primary pull-right'>Selanjutnya</a>
<h3>Step By Step Core & Secondary Factor</h3>
<hr>

<table class='table table-bordered'>
<thead>
	<tr>
	<td rowspan=2>Nama Karyawan</td>
	<td colspan=3>Nilai Total</td>
	</tr>
	<tr>
	<td >Kompetensi Inti</td>
	<td >Kompetensi Kepemimpinan</td>
	<td >Kompetensi Teknis</td>
	</tr>
</thead>

<tbody>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $value->karyawan->nama !!}</td>
	<td>{!! round($data['ki'][$key],2) !!}</td>
	<td>{!!  round($data['ki'][$key],2) !!}</td>
	<td>{!!  round($data['kp'][$key],2) !!}</td>
	
</tr> 
@endforeach
</tbody>
</table>
@stop