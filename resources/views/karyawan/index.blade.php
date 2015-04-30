@extends('template.backend')

@section('content')

<div class="panel panel-default " >
<div class="panel-heading">
    <h4>Karyawan</h4>
</div>

<div class="panel-body">

 <a class="btn btn-primary pull-right" id="sign"  href="{!! route('karyawan.create') !!}"><i class="icon-g-circle-plus"></i>Tambah</a>


<div class='clearfix'></div><br>
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
</div>
</div>
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

