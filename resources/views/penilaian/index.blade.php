@extends('template.backend')

@section('content')

<h3>Nilai Karyawan Periode {!! date('M')." ".date('Y') !!}</h3> 
<a href="{!! url('penilaian/input') !!}" class='btn btn-primary pull-right'> Input nilai</a>
<a href="" class='btn btn-primary pull-right'> History</a>
<div class='clearfix'></div><br>
	<table class='table table-bordered' >
	<thead style='background:#ccc'>
	<tr>
		<td>NIK</td>
		<td>Nama</td>
	@foreach ($kriterias as $k => $kriteria) 
		<td>
		{!! $kriteria->nama !!}
		</td>
	@endforeach
	</tr>
	</thead>
	<tbody>
	@foreach ($karyawans as $key => $karyawan) 
	<tr>
		<td style='background:#ccc'>{!! $karyawan->nik !!}</td>
		<td style='background:#ccc'>{!! $karyawan->nama !!}</td>
		{!! Form::input('hidden',"id_karyawan[]",$karyawan->id,['class'=>'form-control', 'style'=>'width:40px']) !!}
	@foreach ($kriterias as $k => $kriteria) 
		<td>
		<?php $nilai = $penilaian->select('nilai')->whereRaw("
			Year(tanggal)=$tanggal[year] AND 
			Month(tanggal)=$tanggal[month] AND 
			id_karyawan=$karyawan->id AND 
			kode_kriteria='$kriteria->kode'")->first()
		 ?>
		{!! $nilai->nilai !!}
		</td>
	@endforeach
	<tr>
	@endforeach
	</tbody>
	</table>

@stop