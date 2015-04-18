<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model {

	protected $table ='jabatan';
	protected $guarded =['id'];
	protected $fillable = [
		'nama'
	];
	public $timestamps= false;

	public function divisi(){
		return $this->belongsToMany('App\Divisi','jabatan_divisi','id_jabatan','id_divisi');
	}
}
