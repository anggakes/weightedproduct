@extends('template.backend')

@section('content')

<?php $i = 1 ?>
<?php 
// hmm ribet nn di definisiin disini, mungkin nanti ada cara lebih baik

$m = [
	'01' => 'Januari',
	'02' => 'Februari',
	'03' => 'Maret',
	'04' => 'April',
	'05' => 'Mei',
	'06' => 'Juni',
	'07' => 'Juli',
	'08' => 'Agustus',
	'09' => 'September',
	'10' => 'Oktober',
	'11' => 'November',
	'12' => 'Desember',
];

$y = array();
for($tahun=date('Y');$tahun>=2010;$tahun--){
	$y[$tahun] = $tahun;
}

?>

<a href="" class='pull-right btn btn-primary'>Cetak</a> 
@if(count($wp)>0)
	<a href='{!! url("stepbystep")."?m=$periode[m]&y=$periode[y]"!!}' class='pull-right btn btn-primary'>Step By Step</a> 
@endif
<h3>Laporan Penerima Bonus Karyawan</h3>
<br>
{!! Form::open(['url'=>"laporan","method"=>'get'])!!}
{!! Form::select('m',$m,@$periode['m'],['class'=>'form-control']) !!}
{!! Form::select('y',$y,@$periode['y'],['class'=>'form-control']) !!}

<input type='submit' value='Tampilkan' class='form-control' />

{!! Form::close()!!}



<table class='table'>
<th>No.</th>
<th>NIK</th>
<th>Nama Karyawan</th>
<th>Nilai</th>
<tbody>
	@if(count($wp)>0)
@foreach ($wp as $key => $value) 
@if($i<=$batas)
<tr>
	<td>{!! $i++ !!}</td>
	<td>{!! $value['karyawan']->nik !!}</td>
	<td>{!! $value['karyawan']->nama !!}</td>
	<td>{!! $value['hasil'] !!}</td>
</tr>
@else
	<?php break; ?>
@endif
@endforeach
	@else
<tr>
	<td colspan=4 ><center>Data belum ada</center></td>
</tr>
	@endif
</tbody>
</table>
@stop