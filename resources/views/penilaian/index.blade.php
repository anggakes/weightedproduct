@extends('template.backend')

@section('content')
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
@if($cek)
	<a href='{!! url("penilaian/edit")."?m=$tanggal[month]&y=$tanggal[year]"!!}' class='pull-right btn btn-primary'>Edit</a> 
@endif
<a href="{!! url('penilaian/input') !!}" class='btn btn-primary pull-right'> Input Nilai </a>
<h3>Penilaian</h3><br>
{!! Form::open(['url'=>"penilaian","method"=>'get'])!!}
History Nilai :
{!! Form::select('m',$m,@$tanggal['month'],['class'=>'form-control']) !!}
{!! Form::select('y',$y,@$tanggal['year'],['class'=>'form-control']) !!}

<input type='submit' value='Tampilkan' class='form-control' />

{!! Form::close()!!}



@if($cek)

<br>
	<table class='table table-bordered'>
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
		<td >{!! $karyawan->nik !!}</td>
		<td >{!! $karyawan->nama !!}</td>
		{!! Form::input('hidden',"id_karyawan[]",$karyawan->id,['class'=>'form-control', 'style'=>'width:40px']) !!}
	@foreach ($kriterias as $k => $kriteria) 
		<td>
		<?php $nilai = $penilaian->select('nilai')->whereRaw("
			Year(periode)=$tanggal[year] AND 
			Month(periode)=$tanggal[month] AND 
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
@else
<center>Data Belum ada</center>
@endif


@stop