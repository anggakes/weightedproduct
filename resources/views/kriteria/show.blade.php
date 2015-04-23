@extends('template.backend')

@section('content')

<h1>Kriteria {{ $kriteria->kode." - ".$kriteria->nama }}</h1>

	<div> Kode : {!! $kriteria->kode !!} </div> 

	<div> Nama : {!! $kriteria->nama !!} </div> 

	<div> bobot : {!! $kriteria->bobot !!} </div> 
<hr>

<table class='table'>
<thead>
	<th>Keterangan</th>
	<th>Batas Atas</th>
	<th>Batas Bawah</th>
	<th>Nilai</th>	
</thead>
<tbody>

<?php
	
	$nilai_kriteria = [
		"sangat tinggi",
		"tinggi",
		"cukup",
		"rendah",
		"sangat rendah" 
	];

?>

@foreach($kriteria->nilaiKriteria as $key => $nk)
<tr>
	<td>{!! $nilai_kriteria[$key] !!}</td>
	<td>{!! ($nk->batas_atas==999999 OR $nk->batas_atas==-999999) ? 
		"~" : $nk->batas_atas  !!}</td>
	<td>{!! ($nk->batas_bawah==999999 OR $nk->batas_bawah==-999999) ? 
		"~" : $nk->batas_bawah!!}</td>
	<td>{!! $nk->bobot !!}</td>
</tr>
@endforeach
</tbody>
</table>
@stop

