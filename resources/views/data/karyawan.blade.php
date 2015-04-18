
@extends('template.index')

<!-- awal section content -->
@section('content')

  <div class="span12">
    <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-user"></i>
              <h3> Karyawan </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                    <a href="tambah_karyawan" class="btn btn-primary"><i class="icon-plus-sign"></i>Tambah</a>
                    @include('data.dummy-table') 
                         
              </div>
           </div>
         </div>
    </div>
  </div> 


@stop

@section('js')
<script type="text/javascript">
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>
@stop




 