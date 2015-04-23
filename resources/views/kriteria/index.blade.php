@extends('template.backend')

@section('content')
 <a class="btn btn-primary pull-right" id="sign"  href="{!! route('karyawan.create') !!}"><i class="icon-g-circle-plus"></i>Tambah</a>
<h1>Karyawan</h1>

<hr>
    <table class='table datatables'>
        <thead>
        <tr>
          <th>NIK</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Tempat/Tanggal Lahir</th>
          <th>No Hp</th>
          <th>Alamat</th>
          <th>#</th>
        </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>
@stop

@section('js')

 {!!Html::script("assets/laravel/laravel.methodHandler.js")!!} 
   
 <script type="text/javascript">    

    $(document).ready(function(){

          $(".datatables").dataTable({
              "ajax" : "{!! route('karyawan.datatables') !!}"
            }).on("draw.dt",function(){
              //inisialisi saat datatables setelah load
                   $('a[data-method]').click(function(e){
                      handleMethod(e,$(this));
                      e.preventDefault();
                   });
            }); 

    });
     
 </script>
 @stop

