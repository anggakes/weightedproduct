<?php 
// hmm ribet nn di definisiin disini, mungkin nanti ada cara lebih baik

$m = [
  '01' => 'Januari',
  '02' => 'Februari',
  '03' => 'Maret',
  '04' => 'April',
  '05' => 'Mei',
  '06' => 'Juni',
  '07' => 'Juli',
  '08' => 'Agustus',
  '09' => 'September',
  '10' => 'Oktober',
  '11' => 'November',
  '12' => 'Desember',
];

$y = array();
for($tahun=date('Y');$tahun>=2010;$tahun--){
  $y[$tahun] = $tahun;
}

?>

<!DOCTYPE HTML>
<Html lang="en">

<head>

<!-- lapro.id -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Weighted Product</title>
  <!-- Bootstrap Core CSS -->
    {!!Html::style("assets/sb-admin/bower_components/bootstrap/dist/css/bootstrap.min.css")!!}
    {!!Html::style("assets/sb-admin/bower_components/metisMenu/dist/metisMenu.min.css")!!}
    {!!Html::style("assets/sb-admin/dist/css/sb-admin-2.css")!!}
    {!!Html::style("assets/sb-admin/bower_components/font-awesome/css/font-awesome.min.css")!!}
    {!!Html::style("assets/datatables/jquery.dataTables.css")!!}

        <!-- Zabuto Calendar -->
    {!!Html::style("assets/zabuto/zabuto_calendar.css")!!}
    
    <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/Html5shiv/3.7.0/Html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- Css -->
<style type="text/css">
.table thead td{
  text-align: center;
 }
 .disabled {
   pointer-events: none;
   cursor: default;
}
</style>
@yield('css')


<!-- Le Html5 shim, for IE6-8 support of Html5 elements -->
<!--[if lt IE 9]>
      <script src="http://Html5shim.googlecode.com/svn/trunk/Html5.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">

        <!-- Navigation -->
        <nav id="collapseTwo" class="panel-collapse navbar navbar-default navbar-static-top collapse in" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.Html">Sistem Pendukung Keputusan - CV Intan Rezeki Agung</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                @if(Auth::check())
        
           <li><span style="margin-right:20px">Selamat datang, {!! @Auth::user()->name!!}</span>  </li>
           <li><a  href="{!! url("login/logout")!!}" class='btn btn-danger'><span>Logout</span> </a> </li>
             @else
          
           <li><a class='btn btn-danger' href="{!! url("login")!!}"><i class="icon-user"></i><span>login</span> </a> </li>

            @endif
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <!-- /.navbar-static-side -->
        </nav>
        
        <div class="container">
          <div class='row' id='noprint'>
            <div class='col-md-12'style='background:url("{!! url('img/header.jpg')!!}");height:300px '>
        <div id='menu' style='margin-top: 200px'>
             <center>
                @if(Auth::check())
        <li class="menu btn btn-outline  btn-lg dropdown"><a href="{!! url("/")!!}"><i class="fa fa-home"></i> <span>Home</span> </a> </li>
        @if(Auth::user()->roles == 'admin')
        <li class="menu btn btn-outline  btn-lg dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span> Pengguna</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a id="sign" href="{!! route('user.create') !!}"  data-toggle="modal" data-target="#myModal"><i class="icon-plus-sign"></i>Tambah</a></li>
            <li><a href="{!! route("user.index")!!}" href="{!! route('user.create') !!}"><i class="icon-user"></i><span>Manajemen User</span> </a> </li>
          </ul>
        </li>

        <li class="menu btn btn-outline  btn-lg dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-briefcase"></i><span>Karyawan</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a id="sign" href="{!! route('karyawan.create') !!}"  ><i class="icon-plus-sign"></i>Tambah </a></li>
            <li><a href="{!! route("karyawan.index")!!}" href="{!! route('user.create') !!}"><i class="icon-user"></i><span>Manajemen Karyawan</span> </a> </li>
          </ul>
        </li>

        
         <li class="menu btn btn-outline  btn-lg dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-edit"></i><span>Penilaian</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a id="sign" href="{!! url('penilaian/input') !!}"  ><i class="icon-plus-sign"></i>Input Nilai </a></li>
            <li><a href="{!! url("penilaian")!!}" href="{!! route('user.create') !!}"><i class="icon-user"></i><span>Histori Penilaian</span> </a> </li>
          </ul>
        </li>

        @else

        
        <li class="menu btn btn-outline  btn-lg"><a href="{!! url('laporan') !!}"><i class="icon-table"></i><span>Laporan</span> </a> </li>
          
        </li>

        @endif     
        
        @endif

               
                    </center>
                  </div>
            </div>
          </div>
            <div class="row " style="margin-top: 10px;margin-bottom:10px;">
                    
            </div>

            <div  class="row " style="min-height:370px;">
              <div class='col-md-3' style="min-height:370px;" id="noprint">
                <div class="panel panel-default" >
<div class="panel-heading" style='background:#d9534f;color:#fff'>
   <h4> <i class='fa fa-calendar'></i> Kalender</h4>
 
</div>
<br>
  <div class='col-md-12' id='my-calendar'></div>

<div class="panel-body">

</div></div>
              </div>
              <div class="col-md-9" >
                  @yield('content')
              </div>
              
                  
            </div>
            
            <div class="row ">
               
                <div style='background:#d9534f;color:#fff' class="panel panel-info panel-heading text-right col-lg-12">
                    Sistem Pendukung Keputusan - Weighted Product © 2015.
                </div>
                
            </div>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
@include('modal') <!-- include modal Wrap -->
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

 {!!Html::script("assets/sb-admin/bower_components/jquery/dist/jquery.min.js")!!}

    <!-- Bootstrap Core JavaScript -->
    {!!Html::script("assets/sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js")!!}

    <!-- Metis Menu Plugin JavaScript -->
    {!!Html::script("assets/sb-admin/bower_components/metisMenu/dist/metisMenu.min.js")!!}

    <!-- Custom Theme JavaScript -->
    {!!Html::script("assets/sb-admin/dist/js/sb-admin-2.js")!!}

    {!!Html::script("assets/datatables/jquery.dataTables.js")!!}
    {!!Html::script("assets/zabuto/zabuto_calendar.js")!!}

<!-- Js -->


<script type="text/javascript">
    /* refresh modal u can change the text with img */
	    refreshModal("Loading..");
</script>
<script type="application/javascript">
    $(document).ready(function () {
        $("#my-calendar").zabuto_calendar();
    });
</script>
@yield('js')

</body>

</Html>





