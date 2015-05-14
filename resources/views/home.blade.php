@extends('template.backend')

@section('content')



			<div class="panel panel-default" >
				<div class="panel-heading">Home</div>
				<div class="panel-body">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Sejarah Singkat</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Visi & Misi</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Struktur Organisasi</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home" style='text-align:center'>
    	<div style='margin:0px auto;width:700px;line-height:35px'>
    		<br>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="{!! url('img/3078661_orig.jpg')!!}" alt="...">
    </div>
    <div class="item ">
      <img src="{!! url('img/Rangka-Atap-Baja-Ringan.jpg')!!}" alt="...">
    </div>
    <div class="item ">
      <img src="{!! url('img/waru-20121111-00135.jpg')!!}" alt="...">
    </div>
   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<h3>Sejarah Singkat</h3>
        <hr>
  CV Intan Rezeki Agung adalah perusahaan yang bergerak di bidang perdagangan umum dan jasa konstruksi. Seiring dengan kemajuan zaman dan menipisnya ketersediaan material kayu yang berkualitas membuka peluang usaha baru sebagai alternatif pengganti rangka atap rumah, maka pada tahun 2011 berbekal pengalaman serta didukung oleh keahlian dan keterampilan, CV Intan Rezeki Agung memasarkan dan melayani pemasangan atap baja ringan dengan merk Intan Truss.<br>
  Intan Truss terbuat dari bahan baja mutu tinggi yang berstandar internasional dengan material High Tensile G550 (Hi-Ten G550) yang dilapisi anti karat Almunium Zinc Alloy (AZ-100) sehingga lebih tahan karat. Dengan tegangan maksimum 550 Mpa dan  dalam pengerjaan teknis didukung tenaga teknis di lapangan yang berpengalaman, berkualitas dan bersertifikasi.<br>
  CV intan Rezeki Agung menyediakan produk dan jasa terbaik dalam pemasangan rangka atap baja ringan dan pemasangan plafond gypsum. Untuk kenyamanan, CV Intan Rezeki Agung memberikan jaminan garansi kebocoran 100 hari dan garansi material selama 10 tahun yang dikeluarkan setelah pekerjaan selesai. CV Intan Rezeki Agung mengutaman kepuasan dan pelayanan pelanggan serta pengiriman tepat waktu.
<hr><br>
    </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="profile">

<br>

<blockquote>
<h3>Visi :</h3>
<p>"Menjadi Perusahaan Jasa Konstruksi yang Unggul dan Terpercaya"</p>
</blockquote>
<br>
<blockquote>
<h3>Misi :</h3>
<ul>
<li>  Memberikan pelayanan, mutu, dan kepuasan yang terbaik kepada</li>
 pelanggan.
<li>  Membangun serta menciptakan citra terbaik perusahaan.</li>
<li> Peduli Kepada Lingkungan.</li>
</ul>
</blockquote>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
<center>
<h3>Struktur Organisasi</h3><hr>
  <img src="{!! url('img/struktur organisasi intan rejeki.JPG') !!}" style='' class='col-md-12'>

<br>
</center>

    </div>
  </div>

</div>


				</div>
			</div>



@endsection
