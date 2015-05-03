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

<div class="panel panel-default" >
<div class="panel-heading">
		<h4>Laporan Penerima Bonus Karyawan</h4>
</div>

<div class="panel-body">

<a href="" class='pull-right btn btn-primary'>Cetak</a>  
@if(count($wp)>0)
	<a href='{!! url("konvert")."?m=$periode[m]&y=$periode[y]"!!}' class='pull-right btn btn-primary' style='margin-right:5px'>Step By Step</a> 
@endif
<div class="clearfix"></div>

{!! Form::open(['url'=>"penilaian","method"=>'get',"class"=>"form-inline"])!!}
Periode :
{!! Form::select('m',$m,@$periode['m'],['class'=>'form-control']) !!}

{!! Form::select('y',$y,@$periode['y'],['class'=>'form-control']) !!}

<input type='submit' value='Tampilkan' class='form-control btn btn-primary' />

{!! Form::close()!!}
<div class="clearfix"></div>
<br>

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
	<td>{!! round($value['hasil'],3) !!}</td>
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

				</div>
			</div><!-- end panel -->
@stop