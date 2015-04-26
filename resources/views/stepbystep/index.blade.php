@extends('template.backend')

@section('content')
<?php $i = 1 ?>
<a href='{!! url("laporan")."?m=$periode[m]&y=$periode[y]"!!}' class='pull-right btn btn-primary'>Selanjutnya</a> 
<h3>Tabel Vector S</h3>
<br>
<table class='table'>
	<th>No.</th>
	<th>NIK</th>
	<th>Nama Karyawan</th>
@foreach ($kriterias as $k => $kriteria) 
	<th>{!! $kriteria->kode !!}</th>
@endforeach
	<th>Hasil</th>
<tbody>

@foreach ($wp['pangkat_bobot'] as $key => $value) 

<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $karyawans[$key]->nik!!}</td>
	<td>{!! $karyawans[$key]->nama!!}</td>
@foreach ($kriterias as $k => $kriteria) 
	<th>{!! $value[$kriteria->kode] !!}</th>
@endforeach
	<td>{!! $value['hasil'] !!}</td>
</tr>
@endforeach
<tr>
<td colspan=8><center>Total</center></td><td>{!! $wp['total'] !!}</td>
</tr>
</tbody>
</table>

@stop