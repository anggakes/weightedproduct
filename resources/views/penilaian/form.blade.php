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
<div class='col-md-2'>
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

<style>
.table{
	width:1200px;

}

</style>
<div class='span12' style="overflow: scroll;">
<table class='table table-bordered' style="overflow: scroll"  >
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
	<?php 
		// cek jika sumber datanya 2 = pengalaman maka:
		$nilai = ($kriteria->sumber_data == 2) ? 
					$karyawan->lamaBekerja() : 0;
		$type = ($kriteria->sumber_data == 2) ? 
					'readonly' : '';
	?>
	@if($kriteria->sumber_data==2 or $kriteria->sumber_data==1)
	{!! Form::input('number',"kriteria[$kriteria->kode][]",$nilai,['class'=>'form-control ', 'style'=>'width:80px', $type, 'required','min'=>0,'max'=>100]) !!}
	@else
	{!! Form::select("kriteria[$kriteria->kode][]",$penilaian->option,$nilai,['class'=>'form-control ', 'style'=>'', $type, 'required','min'=>0,'max'=>100]) !!}</center>
	@endif
	</td>

@endforeach
<tr>
@endforeach
</tbody>
</table>
</div>