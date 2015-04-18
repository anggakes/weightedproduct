@extends('template.backend')

@section('content')
<a href="{!! action('StepByStepController@getConvertgap',[$id_lowongan]
	)!!}" class='btn btn-primary pull-right'>Selanjutnya</a>
<h3>Step By Step Nilai Gap</h3>
<hr>
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
<td colspan=2>gap</td>
</tr>
</thead>
<tbody>
<?php $i=1; ?>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $value->karyawan->nama !!}</td>
	@foreach ($nilai[$key]['ki'] as $n) 
		<td>{!! $n !!}</td>
	@endforeach
	<td></td>
	<td></td>
</tr> 
@endforeach
<tr style='background:#B9CAFF'> <!-- profil bobot -->
	<td></td>
	<td>Profil</td>
	@foreach ($bobot['ki'] as $b) 
		<td>{!! $b !!}</td>
	@endforeach
	<td>(-)</td>
	<td>(+)</td>
</tr> <!-- profil bobot -->
<?php $i=1; ?>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $value->karyawan->nama !!}</td>
	<?php $plus = 0; $minus = 0; ?>
	@foreach ($data['ki'][$key] as $n) 
		<td>{!! $n !!}</td>
<?php
	if($n>0){
		$plus+=$n;
	}else{
		$minus+=$n;
	}
?>
	@endforeach
	<td>{!! $plus !!}</td>
	<td>{!! $minus !!}</td>
</tr> 
@endforeach
</tbody>
</table>

<!-- ================================================================= -->
<center><h3>Nilai KP  </h3></center><br>

<table class='table'>
<thead style='background:#c0c0c0'>
<tr>
<td>No</td>
<td>Nama Karyawan</td>
<td>KP01</td>
<td>KP02</td>
<td>KP03</td>
<td colspan=2>gap</td>
</tr>
</thead>
<tbody>
<?php $i=1; ?>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $value->karyawan->nama !!}</td>
	@foreach ($nilai[$key]['kp'] as $n) 
		<td>{!! $n !!}</td>
	@endforeach
	<td></td>
	<td></td>
</tr> 
@endforeach
<tr style='background:#B9CAFF'> <!-- profil bobot -->
	<td></td>
	<td>Profil</td>
	@foreach ($bobot['kp'] as $b) 
		<td>{!! $b !!}</td>
	@endforeach
	<td>(-)</td>
	<td>(+)</td>
</tr> <!-- profil bobot -->
<?php $i=1; ?>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $value->karyawan->nama !!}</td>
	<?php $plus = 0; $minus = 0; ?>
	@foreach ($data['kp'][$key] as $n) 
		<td>{!! $n !!}</td>
<?php
	if($n>0){
		$plus+=$n;
	}else{
		$minus+=$n;
	}
?>
	@endforeach
	<td>{!! $plus !!}</td>
	<td>{!! $minus !!}</td>
</tr> 
@endforeach
</tbody>
</table>

<!-- ================================================================= -->
<center><h3>Nilai KT </h3></center><br>

<table class='table'>
<thead style='background:#c0c0c0'>
<tr>
<td>No</td>
<td>Nama Karyawan</td>
<td>KT01</td>
<td>KT02</td>
<td colspan=2>gap</td>
</tr>
</thead>
<tbody>
<?php $i=1; ?>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $value->karyawan->nama !!}</td>
	@foreach ($nilai[$key]['kt'] as $n) 
		<td>{!! $n !!}</td>
	@endforeach
	<td></td>
	<td></td>
</tr> 
@endforeach
<tr style='background:#B9CAFF'> <!-- profil bobot -->
	<td></td>
	<td>Profil</td>
	@foreach ($bobot['kt'] as $b) 
		<td>{!! $b !!}</td>
	@endforeach
	<td>(-)</td>
	<td>(+)</td>
</tr> <!-- profil bobot -->
<?php $i=1; ?>
@foreach ($lulus as $key => $value) 
<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $value->karyawan->nama !!}</td>
	<?php $plus = 0; $minus = 0; ?>
	@foreach ($data['kt'][$key] as $n) 
		<td>{!! $n !!}</td>
<?php
	if($n>0){
		$plus+=$n;
	}else{
		$minus+=$n;
	}
?>
	@endforeach
	<td>{!! $plus !!}</td>
	<td>{!! $minus !!}</td>
</tr> 
@endforeach
</tbody>
</table>
@stop