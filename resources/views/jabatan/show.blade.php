@extends('template.backend')

@section('content')
<a href="{!! action('SeleksiJabatanController@getLulusSyarat',[$lowongan->id]
	)!!}" class='btn btn-primary btn-lg pull-right'> Proses Seleksi</a>
<a href="{!! action('StepByStepController@getGap',[$lowongan->id]
	)!!}" class='btn btn-primary btn-lg {!! (count($kandidat)>0)? "" : "disabled" !!} pull-right'> Step By Step</a>
<h1>Jabatan {{ $lowongan->kode }} - {{ $lowongan->nama }} </h1>

<hr>
Kandidat terpilih : 
@if(count($kandidat)>0)
{!! $kandidat[0]->karyawan->nama; !!}
@else
"Belum ada yang terpilih"
@endif
<br><br>
<table class='table table-bordered'>
<thead>
<tr>
<th>Peringkat</th>
<th>Nama</th>
<th>Nilai Topsis</th>
</tr>
</thead>
<tbody>
<?php $i=1; ?>
@if(count($kandidat)>0)
@foreach ($kandidat as $key => $value)
<tr>
<td>{!! $i++ !!}</td>
<td>{!! $value->karyawan->nama !!}</td>
<td>{!! $value->nilai !!}</td>
</tr>

@endforeach
@else
<tr>
<td colspan=2>harap klik tombol proses</td>
</tr>
@endif
</tbody>
</table>

@stop

