@extends('template.backend')

@section('content')

<h1>Kriteria</h1>

<hr>
    <table class='table '>
        <thead>
        <tr>
          <th>Kode</th>
          <th>Nama Kriteria</th>
          <th>Bobot</th>
          <th>Aksi</th>
          
        </tr>
        </thead>
        <tbody>
          @foreach($kriteria as $kriteria)
        <tr>
        
          <th>{!! $kriteria->kode !!}</th>
          <th>{!! $kriteria->nama !!}</th>
          <th>{!! $kriteria->bobot !!}</th>
          <th><a href="{!! route('kriteria.show',$kriteria->kode) !!}">Ubah Nilai</a></th>
        </tr>
          @endforeach
        </tbody>
    </table>
@stop

@section('js')

 {!!Html::script("assets/laravel/laravel.methodHandler.js")!!} 
   
 <script type="text/javascript">    

    $(document).ready(function(){


    });
     
 </script>
 @stop

