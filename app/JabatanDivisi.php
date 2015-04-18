<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class JabatanDivisi extends Model {

	protected $table ='jabatan_divisi';
	protected $guarded =['id'];
	protected $fillable = [
		'id_divisi',
		'id_jabatan'
	];
	
	public $timestamps= false;
}
