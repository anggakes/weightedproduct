<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\BobotNilaiJabatanKi;
use App\BobotNilaiJabatanKp;
use App\BobotNilaiJabatanKt;
use App\ProfilSyaratJabatan;

class Lowongan extends Model {

	protected $table ='lowongan';
	protected $guarded =['id'];
	protected $fillable = [
		'id_jabatan',
		'kode'
	];

	public function bobotNilaiJabatanKi(){
		return $this->hasOne("App\BobotNilaiJabatanKi","id_lowongan");
	}

	public function bobotNilaiJabatanKp(){
		return $this->hasOne("App\BobotNilaiJabatanKp","id_lowongan");
	}

	public function bobotNilaiJabatanKt(){
		return $this->hasOne("App\BobotNilaiJabatanKt","id_lowongan");
	}
	
	public function profilSyaratJabatan(){
		return $this->hasOne("App\ProfilSyaratJabatan","id_lowongan");
	}

	public function jabatan(){
		return $this->belongsTo("App\Jabatan","id_jabatan");
	}

	public function createAll($data){
		
		return DB::transaction(function()use($data){
			$lowongan = $this->create($data['lowongan']);
			$data['bobotKi']['id_lowongan'] = $lowongan->id;
			$data['bobotKp']['id_lowongan'] = $lowongan->id;
			$data['bobotKt']['id_lowongan'] = $lowongan->id; 
			$data['profil_syarat_jabatan']['id_lowongan'] = $lowongan->id;  
			BobotNilaiJabatanKi::create($data['bobotKi']);
			BobotNilaiJabatanKp::create($data['bobotKp']);
			BobotNilaiJabatanKt::create($data['bobotKt']);
			ProfilSyaratJabatan::create($data['profil_syarat_jabatan']);
		});
	}

	public function updateAll($data, $id){
		
		return DB::transaction(function()use($data, $id){
			$lowongan = $this->findOrFail($id)->update($data['lowongan']);
			BobotNilaiJabatanKi::where('id_lowongan','=',$id)->update($data['bobotKi']);
			BobotNilaiJabatanKp::where('id_lowongan','=',$id)->update($data['bobotKp']);
			BobotNilaiJabatanKt::where('id_lowongan','=',$id)->update($data['bobotKt']);
			ProfilSyaratJabatan::where('id_lowongan','=',$id)->update($data['profil_syarat_jabatan']);

		});
	}
		

}
