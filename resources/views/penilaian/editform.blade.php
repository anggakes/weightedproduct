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

<div class='row'>
<div class='col-md-1'>
Periode : 
</div>
<div class='col-md-2'>
{!! Form::select('m',$m,date('m'),['class'=>'form-control ']) !!}
</div>
<div class='col-md-2'>
{!! Form::select('y',$y,date('Y'),['class'=>'form-control ']) !!}
</div>
</div>
<br>


<table class='table table-bordered' >
<thead>
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
	<td>{!! $karyawan->nik !!}</td>
	<td>{!! $karyawan->nama !!}</td>
	{!! Form::input('hidden',"id_karyawan[]",$karyawan->id,['class'=>'form-control', 'style'=>'width:40px']) !!}
@foreach ($kriterias as $k => $kriteria) 
	
	<td><center>
	<?php $nilai = $penilaian->select('nilai')->whereRaw("
			Year(periode)=$tanggal[year] AND 
			Month(periode)=$tanggal[month] AND 
			id_karyawan=$karyawan->id AND 
			kode_kriteria='$kriteria->kode'")->first()
		 ?>
	{!! Form::text("kriteria[$kriteria->kode][]",$nilai->nilai,['class'=>'form-control ', 'style'=>'width:80px', 'required']) !!}
	</center>
	</td>

@endforeach
<tr>
@endforeach
</tbody>
</table>