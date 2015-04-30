@extends('template.backend')

@section('content')
<?php $i = 1 ?>

<div class="panel panel-default" >
<div class="panel-heading">
		<h4>Tabel Vector S</h4>
</div>

<div class="panel-body">

<a href='{!! url("laporan")."?m=$periode[m]&y=$periode[y]"!!}' class='pull-right btn btn-primary'>Selanjutnya</a> 
<div class="clearfix"></div><br>

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
				</div>
			</div><!-- end panel -->
@stop