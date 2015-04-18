
@extends('template.index')

<!-- awal section content -->
@section('content')

  <div class="span5">
    <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list"></i>
              <h3> Lowongan </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">

                  <div class="row">
                      <div class="span3">
                        <a href="#myModal" role="button" data-toggle="modal" class="btn btn-primary" style="width:220px"><i class="icon-wrench"></i>Bobot Kompetensi Inti</a>
                        <br>
                        @include('data.form_kompetensi_inti')

                        <a href="#myModal2" role="button" data-toggle="modal" class="btn btn-primary" style="width:220px"><i class="icon-wrench"></i>Bobot Kompetensi Kepemimpinan</a>
                        <br>
                        @include('data.form_kepemimpinan')

                        <a href="#myModal3" role="button" data-toggle="modal" class="btn btn-primary" style="width:220px"><i class="icon-wrench"></i>Bobot Kompetensi Teknis</a>
                        <br>
                        @include('data.form_teknis')

                        <a href="#" class="btn btn-primary" style="width:93px"><i class="icon-cogs"></i>Proses</a>
                        <a href="hasil" class="btn btn-primary" style="width:93px"><i class="icon-list"></i>Hasil</a>
                        
                      </div>
                  </div>
                   
                    <br>
                   
                         
              </div>
           </div>
         </div>
    </div>
  </div> 


@stop

@section('js')
<script type="text/javascript">
</script>
@stop




 