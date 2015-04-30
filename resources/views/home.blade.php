@extends('template.backend')

@section('content')



			<div class="panel panel-default" >
				<div class="panel-heading">Home</div>
				<div class="panel-body">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Sejarah Singkat</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Visi & Nilai Inti</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Struktur Organisasi</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home" style='text-align:center'>
    	<div style='margin:0px auto;width:700px'>
    		
  Sejarah
    </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="profile">
    	<center> 

Visi misi
</center>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
<center>
struktur organisasi
<br>
</center>

    </div>
  </div>

</div>


				</div>
			</div>



@endsection
