@extends('template.backend')

@section('content')
<style type="text/css">
	.datatables{
		text-align:center;
	}
</style>

<div class="panel panel-default " >
<div class="panel-heading">
		<h4>Profil {{ $karyawan->nama }} </h4>
</div>

<div class="panel-body">
<table class="table">
  <tr>
  <td>NIK : </td>
  <td>{{$karyawan->nik}}</td>
</tr>
<tr>
   <td>Nama : </td>
  <td>{{$karyawan->nama}}</td>
  </tr>
  <tr>
   <td>Jenis Kelamin : </td>
  <td>{{$karyawan->jenis_kelamin}}</td>
  </tr>
  <tr>
  <td>Tempat Lahir : </td>
  <td> {{ $karyawan->tempat_lahir }}</td>
  </tr>
  <tr>
  <td>Tanggal Lahir : </td>
  <td> {{ $karyawan->tanggal_lahir }}</td>
  </tr>
  <tr>
  <td>Nomor Hp : </td>
  <td>{{$karyawan->no_hp}}</td>
  </tr>
  <tr>
  <td>Alamat : </td>
  <td>{{$karyawan->alamat}}</td>
  </tr>
</table>

<h4>Histori Penilaian</h4><hr>

<table class='table datatables'>
<thead>
	<tr>
<td>Periode</td>
@foreach ($kriteria as $key => $value) 
<td>{!! $value->nama!!}</td>
@endforeach
	</tr>
</thead>
</table>

</div></div>
@stop

@section('js')

   
 <script type="text/javascript">    

    $(document).ready(function(){

          $(".datatables").dataTable({
              "ajax" : "{!! route('penilaiankaryawan.datatables',$karyawan->id) !!}"
            }).on("draw.dt",function(){
              
            }); 

    });
     
 </script>
 @stop

