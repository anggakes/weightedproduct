@extends('template.backend')

@section('content')
<?php $i = 1 ?>

<div class="panel panel-default" >
<div class="panel-heading">
		<h4>Konversi Nilai</h4>
</div>

<div class="panel-body">

<a href='{!! url("vectors")."?m=$periode[m]&y=$periode[y]"!!}' class='pull-right btn btn-primary'>Selanjutnya</a> 
<div class="clearfix"></div><br>

<table class='table'>
	<th>No.</th>
	<th>NIK</th>
	<th>Nama Karyawan</th>
@foreach ($kriterias as $k => $kriteria) 
	<th>{!! $kriteria->kode !!}</th>
@endforeach
	
<tbody>

@foreach ($nilai as $key => $value) 

<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $karyawans[$key]->nik!!}</td>
	<td>{!! $karyawans[$key]->nama!!}</td>
@foreach ($kriterias as $k => $kriteria) 
	<th>{!! round($value[$kriteria->kode],3) !!}</th>
@endforeach

</tr>
@endforeach

</tbody>
</table>
				</div>
			</div><!-- end panel -->
@stop