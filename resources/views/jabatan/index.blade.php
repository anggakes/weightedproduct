@extends('template.backend')

@section('content')
 <a class="btn btn-primary pull-right" href="{!! route('jabatan.create') !!}"><i class="icon-g-circle-plus"></i>Tambah</a>
<h1>Kelola Jabatan</h1>

 <hr>
    <table class='table datatables'>
        <thead>
        <tr>
          <th>Nama</th>
          <th>Divisi</th>
          <th>#</th>
        </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>


@include('modal') <!-- include modal Wrap -->

@stop


@section('js')
  
  {!!Html::script("assets/laravel/laravel.methodHandler.js")!!} 
   
 <script type="text/javascript">    

    $(document).ready(function(){

          $(".datatables").dataTable({
              "ajax" : "{!! route('jabatan.datatables') !!}",
              "fnInitComplete": function(oSettings, json) {
                  //inisialisi saat datatables setelah load
                   $('a[data-method]').click(function(e){
                      handleMethod(e,$(this));
                      e.preventDefault();
                   });
                }
            }); 

    });
     
 </script>
 @stop

