@extends('template.backend')

<link rel="stylesheet" href="{!!URL::to('assets/print.css')!!}" type="text/css" media="print" />

@section('content')
<a href="{!! action('SeleksiJabatanController@getLulusSyarat',[$lowongan->id]
	)!!}" class='btn btn-primary btn-lg pull-right'> Seleksi Lulus Syarat</a>
@if(Auth::user()->roles == 'tim independent')
<a href="{!! action('SeleksiJabatanController@getSeleksiJabatan',[$lowongan->id]
	)!!}" class='btn btn-primary btn-lg {!! (count($kandidat)>0)? "" : "disabled" !!} pull-right' id='btn1'> Seleksi Profile Matching</a>
<a href="{!! action('StepByStepController@getGap',[$lowongan->id]
	)!!}" class='btn btn-primary btn-lg {!! (count($hasil)>0)? "" : "disabled" !!} pull-right' id='btn1'> Step By Step</a>

<a href="" class='btn btn-primary btn-lg pull-right' id='cetak' onclick='window.print()'>Cetak</a>
@endif
<h1>Jabatan {{ $lowongan->jabatan->nama }} </h1>

<hr>
<div class='pull-right'> 
Divisi : 
@foreach ($lowongan->jabatan->divisi as $key => $value)
<span class="label label-warning">{!! $value->nama !!}</span>
@endforeach
</div>
<br><br>
<center>
<h3>
	Kandidat terpilih :
@if(count($hasil)>0)

 {!! $hasil[0]->karyawan->nama; !!} dari divisi {!! $hasil[0]->karyawan->profilSyaratKaryawan->divisi->nama; !!}

@else
"Belum ada yang terpilih"
@endif
</h3>
</center>
<br><br>
@if(Auth::user()->roles == 'tim independent')

<table class='table table-bordered' style='width:80%; margin:0px auto'>
<thead>
	<tr>
	<th>Peringkat</th>
	<th>Nama</th>
	<th>Divisi</th>
	@if(Auth::user()->roles == 'tim independent')
	<th>Nilai Profile Matching</th>
	@endif
	</tr>
</thead>
<tbody>

@if(count($hasil)>0)
<?php $i=1; ?>
@foreach ($hasil as $key => $value)
	<tr>
		<td>{!! $i++ !!}</td>
		<td>{!! $value->karyawan->nama !!}</td>
		<td>{!! $value->karyawan->profilSyaratKaryawan->divisi->nama !!}</td>
		<td>{!! $value->nilai!!}</td>
	</tr>
	@endforeach
	@else
	<tr>
	<td colspan=4><center>harap klik tombol proses</center></td>
	</tr>
@endif
</tbody>
</table>
<hr>
@endif <!-- endif untuk badan indepnedent --> 


<div class='lulus-syarat'> <!-- Lulus Syarat -->
<div class='alert alert-info'>
<h4>Info </h4> 
Admin hanya dapat melakukan seleksi lulus syarat karyawan. untuk input nilai karyawan dan hasil seleksi dilakukan oleh tim independent.<br> warna Merah berarti nilai belum diinput
</div>

<h4>Kandidat Karyawan Lulus Syarat :</h4>
<br>

<table class='table table-bordered' style='width:80%; margin:0px auto'>
<thead>
	<tr>
	<th>Nama</th>
	<th>Divisi</th>
	@if(Auth::user()->roles == 'tim independent')
	<th>Input Nilai</th>
	@endif
	</tr>
</thead>
<tbody>


@if(count($kandidat)>0)
@foreach ($kandidat as $key => $value)
	<tr {!! (count($value->karyawan->nilaiKiKaryawan)==0) ? "style='background:pink'" : "" !!}  >
		<td>{!! $value->karyawan->nama !!}</td>
		<td>{!! $value->karyawan->profilSyaratKaryawan->divisi->nama !!}</td>
		@if(Auth::user()->roles == 'tim independent')
		<td><a href='{!!route("karyawan.get.nilai",[$lowongan->id,$value->karyawan->id]) !!}'>Input Nilai</a></td>
		@endif
	</tr>
@endforeach
@else
<tr>
<td colspan=3><center>harap klik tombol proses</center></td>
</tr>
@endif
</tbody>
</table>

</div>  <!-- Lulus Syarat -->

@stop

