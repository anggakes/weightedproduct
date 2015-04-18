		<div class="form-group">
			{!! Form::label('nama','Jabatan :') !!}
			{!! Form::select('lowongan[id_jabatan]',$jabatan,@$lowongan->id_jabatan,['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('kode','Kode :') !!}
			{!! Form::text('lowongan[kode]',@$lowongan->kode,['class'=>'form-control']) !!}
		</div>
		<h3>Profil Syarat</h3>
		<div class="form-group">
			{!! Form::label('ki1','Pendidikan Terakhir :') !!}
			{!! Form::select('profil_syarat_jabatan[pendidikan_terakhir]',
				[
					'1'=>'SMA',
					'2'=>'D1 - D3',
					'3'=>'S1',
					'4'=>'S2',
					'5'=>'S3'
				]
				,@$lowongan->profilSyaratJabatan->pendidikan_terakhir,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('ki2','Costumer Service Orientation :') !!}
			{!! Form::select('profil_syarat_jabatan[pengalaman_kerja]',
				[
					'1'=>'1 - 2 Tahun',
					'2'=>'2 - 3 Tahun',
					'3'=>'3 - 4 Tahun',
					'4'=>'4 - 5 Tahun',
					'5'=>'> 5 Tahun'
				]

			,@$lowongan->profilSyaratJabatan->pengalaman_kerja,['class'=>'form-control']) !!}
		</div>
		<h3>Bobot Jabatan Kompetensi Inti</h3>
		<div class="form-group">
			{!! Form::label('ki1','Integrity :') !!}
			{!! Form::text('bobotKi[ki1]',@$lowongan->bobotNilaiJabatanKi->ki1,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('ki2','Costumer Service Orientation :') !!}
			{!! Form::text('bobotKi[ki2]',@$lowongan->bobotNilaiJabatanKi->ki2,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('ki3','Nindya Karya Proffesional Style :') !!}
			{!! Form::text('bobotKi[ki3]',@$lowongan->bobotNilaiJabatanKi->ki3,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('ki4','Continuous Learning :') !!}
			{!! Form::text('bobotKi[ki4]',@$lowongan->bobotNilaiJabatanKi->ki4,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('ki5','Adaptability and Capacity for Change :') !!}
			{!! Form::text('bobotKi[ki5]',@$lowongan->bobotNilaiJabatanKi->ki5,['class'=>'form-control']) !!}
		</div>

		<h3>Bobot Jabatan Kompetensi Kepemimpinan</h3>
		<div class="form-group">
			{!! Form::label('kp1','Interpersonal Persuasiveness Ability :') !!}
			{!! Form::text('bobotKp[kp1]',@$lowongan->bobotNilaiJabatanKp->kp1,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('kp2','Operational Problem Solving and Decision Making :') !!}
			{!! Form::text('bobotKp[kp2]',@$lowongan->bobotNilaiJabatanKp->kp2,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('kp3','Visionary Leadership :') !!}
			{!! Form::text('bobotKp[kp3]',@$lowongan->bobotNilaiJabatanKp->kp3,['class'=>'form-control']) !!}
		</div>
		<h3>Bobot Jabatan Kompetensi Teknis</h3>
		<div class="form-group">
			{!! Form::label('kt1','Manjemen Jasa Konstruksi :') !!}
			{!! Form::text('bobotKt[kt1]',@$lowongan->bobotNilaiJabatanKt->kt1,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('kt2','Pengoperasian Program Komputer :') !!}
			{!! Form::text('bobotKt[kt2]',@$lowongan->bobotNilaiJabatanKt->kt2,['class'=>'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
		</div>
	