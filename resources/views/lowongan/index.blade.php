@extends('template.backend')

@section('content')
 <a class="btn btn-primary pull-right" id="sign"  href="{!! route('lowongan.create') !!}"><i class="icon-g-circle-plus"></i>Tambah</a>
<h1>Lowongan Jabatan</h1>

 <hr>
    <table class='table datatables'>
        <thead>
        <tr>
          <th>Nama</th>
          <th>Kode</th>
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
              "ajax" : "{!! route('lowongan.datatables') !!}",
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

