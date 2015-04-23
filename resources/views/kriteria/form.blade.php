		<div class="form-group">
			{!! Form::label('nama','Nama Kriteria :') !!}
			{!! Form::text('kriteria[nama]',@$kriteria->nama,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('nama','Kode Kriteria :') !!}
			{!! Form::text('kriteria[kode]',@$kriteria->kode,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('nama','Bobot Kriteria :') !!}
			{!! Form::text('kriteria[bobot]',@$kriteria->bobot,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('nama','Sumber Data :') !!}
			{!! Form::select('kriteria[sumber_data]',[
				'1' => 'Inputan',
				'2' => 'Pengalaman'
			],@$kriteria->sumber_data,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('nama','Tipe konversi :') !!}
			{!! Form::select('kriteria[tipe_konversi]',[
				'1' => 'Kurang Dari',
				'2' => 'Lebih Dari'
			],@$kriteria->tipe_konversi,['class'=>'form-control']) !!}
		</div>

<?php
	
	$nilai_kriteria = [
		"5" => "sangat tinggi",
		"4" => "tinggi",
		"3" => "cukup",
		"2" => "rendah",
		"1" => "sangat rendah" 
	];

?>
<hr>
<h3>Nilai Kriteria</h3><br>
		
		@foreach ($nilai_kriteria as $key => $value) 

		<div class="form-group">
			{!! Form::label('nama',$value.' :') !!}
			{!! Form::text("nilai_kriteria[$key][batas_atas]",@$kriteria->bobot,['class'=>'form-control','placeholder'=>'batas atas']) !!} sampai 
			{!! Form::text("nilai_kriteria[$key][batas_bawah]",@$kriteria->bobot,['class'=>'form-control','placeholder'=>'batas bawah']) !!}
		</div>
		
		@endforeach
		
		<div class="form-group">
			{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
		</div>
	