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
			{!! Form::text('kriteria[nama]',@$kriteria->bobot,['class'=>'form-control']) !!}
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
		
		<div class="form-group">
			{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
		</div>
	