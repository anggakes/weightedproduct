@extends('template.backend')

@section('content')

{!! Form::open(['route'=>['karyawan.post.nilai',$id_lowongan,$karyawan->id],'method'=>'post',]) !!}
<h3>Nilai Kompetensi Inti</h3>
				<div class="control-group">											
						<label class="control-label" for="kode">Integrity</label>
						<div class="controls">
							<input type="text" class="span6 disabled" name="ki[ki1]" value="{!! @$karyawan->nilaiKiKaryawan->ki1 !!}">
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
					<div class="control-group">											
						<label class="control-label" for="nama">Customer Service Orientation</label>
						<div class="controls">
							<input type="text" class="span6" name="ki[ki2]" value="{!! @$karyawan->nilaiKiKaryawan->ki2 !!}">
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
					<div class="control-group">											
						<label class="control-label" for="kode">Nindya Karya Profesional Style</label>
						<div class="controls">
							<input type="text" class="span6" name="ki[ki3]" value="{!! @$karyawan->nilaiKiKaryawan->ki3 !!}" >
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
					<div class="control-group">		
					<label class="control-label" for="kode">Continuous Learning</label>
						<div class="controls">
							<input type="text" class="span6" name="ki[ki4]" value="{!! @$karyawan->nilaiKiKaryawan->ki4 !!}" >
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
					<div class="control-group">											
						<label class="control-label" for="nama">Adaptability and Capability for Change</label>
						<div class="controls">
							<input type="text" class="span6" name="ki[ki5]" value="{!! @$karyawan->nilaiKiKaryawan->ki5 !!}">
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->

<h3>Nilai Kompetensi Kepemimpinan</h3>

				<div class="control-group">							
						<label class="control-label" for="kode">Interpesonal Persuasiveness Ability</label>
						<div class="controls">
							<input type="text" class="span6 " name="kp[kp1]" value="{!! @$karyawan->nilaiKpKaryawan->kp1 !!}">
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
					<div class="control-group">											
						<label class="control-label" for="nama">Operational Problem Solving and Decision Making</label>
						<div class="controls">
							<input type="text" class="span6" name="kp[kp2]" value="{!! @$karyawan->nilaiKpKaryawan->kp2 !!}">
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
					<div class="control-group">											
						<label class="control-label" for="kode">Visionary Leadership</label>
						<div class="controls">
							<input type="text" class="span6" name="kp[kp3]" value="{!! @$karyawan->nilaiKpKaryawan->kp3 !!}">
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
<h3>Nilai Kompetensi Teknis</h3>
					<div class="control-group">											
						<label class="control-label" for="kode">Manajemen Jasa Kontruksi</label>
						<div class="controls">
							<input type="text" class="span6 disabled" name="kt[kt1]" value="{!! @$karyawan->nilaiKtKaryawan->kt1 !!}">
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
					<div class="control-group">											
						<label class="control-label" for="nama">Pengoperasian Program Komputer</label>
						<div class="controls">
							<input type="text" class="span6" name="kt[kt2]" value="{!! @$karyawan->nilaiKtKaryawan->kt2 !!}">
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
		
<br>

	<div class="control-group">	
			   <div class="form-group">
			{!! Form::submit('Simpan',['class'=>'btn btn-primary form-control']) !!}
		</div>
	</div>

@stop