		<div class="form-group">
			{!! Form::label('nik','NIK :') !!}
			{!! Form::text('karyawan[nik]',@$karyawan->nik,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('nama','Nama :') !!}
			{!! Form::text('karyawan[nama]',@$karyawan->nama,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('ttl','Tempat/Tanggal Lahir :') !!}
			<div class='row'>
			<div class='col-md-6'>
			{!! Form::text('karyawan[tempat_lahir]',@$karyawan->tempat_lahir,['class'=>'form-control']) !!}
			</div> 
			<div class='col-md-6'>
			{!! Form::input('date','karyawan[tanggal_lahir]',@$karyawan->tanggal_lahir,['class'=>'form-control']) !!}
		</div>
		</div>
		</div>

		<div class="form-group">
			{!! Form::label('jenis_kelamin','Jenis Kelamin :') !!}
			{!! Form::select('karyawan[jenis_kelamin]',[
				'laki-laki'=>'Laki-Laki',
				'perempuan'=>'Perempuan',
			],@$karyawan->jenis_kelamin,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('hp','Handphone :') !!}
			{!! Form::text('karyawan[no_hp]',@$karyawan->no_hp,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('tahun_masuk','Tanggal Masuk Kerja:') !!}
			{!! Form::input('date','karyawan[tahun_masuk]',@$karyawan->tahun_masuk,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('alamat','Alamat :') !!}
			{!! Form::textarea('karyawan[alamat]',@$karyawan->alamat,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
		</div>
	