<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;

use App\Karyawan;
use App\Kriteria;
use App\Penilaian;

class KaryawanController extends Controller {


	public function index()
	{
		
		return view('karyawan.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{	

		return view('karyawan.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		
		$karyawan = Karyawan::create($request->input('karyawan'));
		return redirect()->route('karyawan.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{		
		$karyawan = Karyawan::findOrFail($id);
		$kriteria = Kriteria::all();
		return view('karyawan.show')
		->with('karyawan',$karyawan)
		->with('kriteria',$kriteria);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$karyawan = Karyawan::findOrFail($id);
		return view('karyawan.edit')->with('karyawan',$karyawan);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{	
		$karyawan =Karyawan::findOrFail($id);
		$karyawan->update($request->input("karyawan"));
		return redirect('karyawan');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$karyawan = Karyawan::findOrFail($id);
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

			$l[0] = $value->nik;
			$l[1] = $value->nama;
			$l[2] = $value->jenis_kelamin;
			$l[3] = $value->tempat_lahir." / ".$value->tanggal_lahir;
			$l[4] = $value->no_hp;
			$l[5] = $value->alamat;
			$l[6] = "
			<a href='".route('karyawan.edit',$value->id)."' >Edit</a> - 
			<a href='".route('karyawan.destroy',$value->id)."' data-method = 'DELETE' data-confirm='yakin untuk menghapus?' >Hapus</a> - 
			<a href='".route('karyawan.show',$value->id)."'>Detail</a>
				";

			$data[$i]=$l;
			$i++;
		}

		$return['data'] = $data;
		return response()->json($return);
	}

	public function penilaianDatatables($id){
		$karyawan = Karyawan::findOrFail($id);
		$kriteria = Kriteria::all();
		$data=array();
		$l=array();
		$i=0;
		foreach ($karyawan->getDataPeriode($id) as $value) {
			$tahun = substr($value->periode,0,4) ;
			$bulan = substr($value->periode,5,2);
			$l[0] = substr($value->periode,0,7);
			$col = 1;
			foreach ($kriteria as $idx => $k) {
				$nilai = Penilaian::select('nilai')->whereRaw("
					Year(periode)=$tahun AND 
					Month(periode)=$bulan AND 
					id_karyawan=$id AND 
					kode_kriteria='$k->kode'")->first();
				$l[$col] = $nilai->nilai; 
				$col++;
			}
			$data[$i]=$l;
			$i++;
		}

		$return['data'] = $data;
		return response()->json($return);
	}
}