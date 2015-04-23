@extends('template.backend')

@section('content')

<h1>Profil Karyawan {{ $karyawan->nama }}</h1>
<div>
	Nik : {{ $karyawan->nik }}
</div>
<div>
	Nama : {{ $karyawan->nama }}
</div>
<div>
	Agama : {{ $karyawan->agama }}
</div>
<div>
	Alamat : {{ $karyawan->alamat }}
</div>
<br>
Profil Syarat Karyawan : <br><br>
<div>
	Pendidikan Terakhir : {{ $karyawan->profilSyaratKaryawan->pendidikan_terakhir }}
</div>
<div>
	Lama Bekerja : {{ $karyawan->lamaBekerja() }}
</div>
<h3>Nilai Kompetensi Inti</h3>

@if(count($karyawan->nilaiKiKaryawan)>0)
<div>
	Integrity : {{ $karyawan->nilaiKiKaryawan->ki1 }}
</div>
<div>
	Customer Service Orientation : {{ $karyawan->nilaiKiKaryawan->ki2 }}
</div>
<div>
	Nindya Karya Profesional Style : {{ $karyawan->nilaiKiKaryawan->ki3 }}
</div>
<div>
	Continuous Learning : {{ $karyawan->nilaiKiKaryawan->ki4 }}
</div>
<div>
	Adaptability and Capability for Change : {{ $karyawan->nilaiKiKaryawan->ki5 }}
</div>
@else
	Data Belum diisi
@endif


<h3>Nilai Kepemimpinan</h3>

@if(count($karyawan->nilaiKpKaryawan)>0)
<div>
	Interpesonal Persuasiveness Ability : {{ $karyawan->nilaiKpKaryawan->kp1 }}
</div>
<div>
	Operational Problem Solving and Decision Making : {{ $karyawan->nilaiKpKaryawan->kp2 }}
</div>
<div>
	Visionary Leadership : {{ $karyawan->nilaiKpKaryawan->kp3 }}
</div>
@else
	Data Belum diisi
@endif

<h3>Nilai Kompetensi Inti</h3>

@if(count($karyawan->nilaiKtKaryawan)>0)
<div>
	Manajemen Jasa Kontruksi : {{ $karyawan->nilaiKtKaryawan->kt1 }}
</div>
<div>
	Pengoperasian Program Komputer : {{ $karyawan->nilaiKtKaryawan->kt2 }}
</div>

@else
	Data Belum diisi
@endif

@stop

