@extends('template.backend')

@section('content')

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
			id_kriteria=$kriteria->id")->first()
		 ?>
		{!! $nilai->nilai !!}
		</td>
	@endforeach
	<tr>
	@endforeach
	</tbody>
	</table>

@stop