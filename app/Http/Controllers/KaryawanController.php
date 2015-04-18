<?php namespace App\Http\Controllers;

use App\Karyawan;
use App\ProfilSyaratKaryawan;
use App\Http\Requests;
use App\Http\Requests\KaryawanRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use Auth;
use App\Divisi;

class KaryawanController extends Controller {

	/* 
	|
	|	menggunakan route model binding 
	|	model binding di simpan di providers/RouteServiceProvider
	|
	*/
	public $pendidikan = [
		'SMA' => 1,
		'D1' => 2,
		'D2' => 2,
		'D3' => 2,
		'S1' => 3,
		'S2' => 4,
		'S3' => 5,
	];

	public function index()
	{
		$karyawan= Karyawan::all();
		return view('karyawan.index', compact('karyawan'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{	

		return view('karyawan.create')
		->with('divisi',Divisi::lists('nama','id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$sk = $request->input('profil');
		$sk['nilai_pendidikan_terakhir'] = $this->pendidikan[$sk['pendidikan_terakhir']]; 
		$p = new ProfilSyaratKaryawan($sk);
		$karyawan = Karyawan::create($request->input('karyawan'));
		$karyawan->profilSyaratKaryawan()->save($p);
		//Auth::user()->articles()->save($article);
		return redirect('karyawan');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($karyawan)
	{		
		
		return view('karyawan.show',compact('karyawan'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($karyawan)
	{
		return view('karyawan.edit',compact('karyawan'))
		->with('divisi',Divisi::lists('nama','id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $karyawan)
	{	
		$sk = $request->input('profil');
		$sk['nilai_pendidikan_terakhir'] = $this->pendidikan[$sk['pendidikan_terakhir']]; 

		$karyawan->update($request->input("karyawan"));
		$karyawan->profilSyaratKaryawan()->update($sk);

		return redirect('karyawan');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($karyawan)
	{
		//
		$karyawan->delete();
		return redirect()->route('karyawan.index');
	}

	
	/* tidak terpengaruh model binding */

	public function getNilai($id_lowongan, $id_karyawan){
		$karyawan = Karyawan::findOrFail($id_karyawan);
		return view('karyawan.nilai')
			->with('karyawan',$karyawan)
			->with('id_lowongan',$id_lowongan);
	}

	public function PostNilai($id_lowongan, $id_karyawan, Request $request){
		
		$karyawan =  Karyawan::findOrFail($id_karyawan);

		$karyawan->saveNilai($request->all());

		return redirect()->route('lowongan.show',$id_lowongan);
	}

	public function datatables(){
		$karyawan = Karyawan::all();
		$data=array();
		$l=array();
		$i=0;
		foreach ($karyawan as $value) {
			$aksi_admin = (Auth::user()->roles != 'admin') ?
			"" :
			"<a href='".route('karyawan.edit',$value->id)."' >Edit</a> - 
			<a href='".route('karyawan.destroy',$value->id)."' data-method = 'DELETE' data-confirm='yakin untuk menghapus?' >Hapus</a> - 
			<a href='".route('karyawan.show',$value->id)."'>Detail</a>
			";
			$aksi_tim_independent = (Auth::user()->roles != 'tim independent') ?
			"" :
			"<a href='".route('karyawan.show',$value->id)."'>Detail</a> - 
			<a href='".route('karyawan.get.nilai',$value->id)."'>Input Nilai</a>
			";

			$l[0] = $value->nik;
			$l[1] = $value->nama;
			$l[2] = $value->agama;
			$l[3] = $value->alamat;
			$l[4] = $value->profilSyaratKaryawan->pendidikan_terakhir;

			$l[5] =$value->lamaBekerja()." tahun";
			$l[6] = $value->profilSyaratKaryawan->divisi->nama;
			$l[7] = "
				$aksi_admin
				$aksi_tim_independent
				";

			$data[$i]=$l;
			$i++;
		}

		$return['data'] = $data;
		return response()->json($return);
	}
}