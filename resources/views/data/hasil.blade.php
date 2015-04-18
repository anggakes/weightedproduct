
@extends('template.index')

<!-- awal section content -->
@section('content')

  <div class="span12">
    <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list"></i>
              <h3> Hasil </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                  <div class="row">
                        <a href="#" class="btn btn-primary pull-right"><i class="icon-eye-open"></i>Lihat Proses Profile Matching</a>
                        <a href="#" class="btn btn-primary pull-right"><i class="icon-print"></i>Cetak</a>
                  </div>
                   
                    <br>
                    @include('data.dummy-table-hasil') 
                         
              </div>
           </div>
         </div>
    </div>
  </div> 


@stop

@section('js')
<script type="text/javascript">
$(document).ready(function() {

} );
</script>
@stop




 