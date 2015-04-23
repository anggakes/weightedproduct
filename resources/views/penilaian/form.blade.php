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
	{!! Form::text("kriteria[$kriteria->id][]",null,['class'=>'form-control', 'style'=>'width:40px']) !!}
	</td>
@endforeach
<tr>
@endforeach
</tbody>
</table>