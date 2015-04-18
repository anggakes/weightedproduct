
@extends('template.index')

<!-- awal section content -->
@section('content')

  <div class="span12">
    <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-user"></i>
              <h3> Lowongan Jabatan </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                      <a href="#myModal" class="btn btn-primary pull-right" role="button" class="btn" data-toggle="modal"><i class="icon-plus-sign"></i>Tambah</a>
                      <br /><br />
                      @include('data.dummy-table') 
                      <!-- Modal -->
                      @include('data.form_lowongan')
                                                   
                                                        
                                                    
                       
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




 