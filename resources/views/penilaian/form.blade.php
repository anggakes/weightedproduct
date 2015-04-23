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
	
	<td>
	<?php 
		// cek jika sumber datanya 2 = pengalaman maka:
		$nilai = ($kriteria->sumber_data == 2) ? 
					$karyawan->lamaBekerja() : 0;
		$type = ($kriteria->sumber_data == 2) ? 
					'readonly' : '';
	?>
	{!! Form::text("kriteria[$kriteria->kode][]",$nilai,['class'=>'form-control ', 'style'=>'width:40px', $type]) !!}
	</td>

@endforeach
<tr>
@endforeach
</tbody>
</table>