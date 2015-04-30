@extends('template.backend')
<!-- awal section content -->
@section('content')

<div class="panel panel-default " >
<div class="panel-heading">
    <h4>Pengguna</h4>
</div>

<div class="panel-body">

 @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
  <a class="btn btn-primary pull-right" id="sign"  href="{!! route('user.create') !!}" data-toggle="modal" data-target="#myModal"><i class="icon-g-circle-plus"></i>Tambah</a>
<div class='clearfix'></div><br>
                          <table class='table datatables'>
                              <thead>
                              <tr>
                                          <th>Nama</th>
                                          <th>Username</th>
                                          <th>Role</th>
                                          <th >#</th>
                                    </tr>
                              </thead>
                              <tbody>
                                
                              </tbody>
                          </table>

        </div>
      </div><!-- end panel -->

@include('modal') <!-- include modal Wrap -->

@stop


@section('js')

 {!!Html::script("assets/laravel/laravel.methodHandler.js")!!} 
   
 <script type="text/javascript">    

    $(document).ready(function(){

          $(".datatables").dataTable({
              "ajax" : "{!! route('user.datatables') !!}",
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

