		<div class="form-group">
			{!! Form::label('nik','NIK :') !!}
			{!! Form::text('karyawan[nik]',@$karyawan->nik,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('nama','Nama :') !!}
			{!! Form::text('karyawan[nama]',@$karyawan->nama,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('agama','Agama :') !!}
			{!! Form::select('karyawan[agama]',[
				'islam'=>'Islam',
				'khatolik'=>'Khatolik',
				'protestan'=>'Protestan',
				'hindu'=>'Hindu',
				'budha'=>'Budha',
				'konghuchu'=>'Konghuchu',
				'lainnya'=>'Lainnya'
			],@$karyawan->agama,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('alamat','Alamat :') !!}
			{!! Form::textarea('karyawan[alamat]',@$karyawan->alamat,['class'=>'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('pendidikan_terakhir','Pendidikan Terakhir :') !!}
			{!! Form::select('profil[pendidikan_terakhir]',
				[
					'SMA'=>'SMA',
					'D1'=>'D1',
					'D2'=>'D2',
					'D3'=>'D3',
					'S1'=>'S1',
					'S2'=>'S2',
					'S3'=>'S3',
				]
			,@$karyawan->profilSyaratKaryawan->pendidikan_terakhir,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('tahun_masuk_kerja','Tanggal Masuk Kerja :') !!}
			{!! Form::input('date','profil[tgl_masuk_kerja]',@$karyawan->profilSyaratKaryawan->tgl_masuk_kerja,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('nama','Divisi :') !!}
			{!! Form::select('profil[id_divisi]',$divisi,@$karyawan->profilSyaratKaryawan->id_divisi,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
		</div>
	