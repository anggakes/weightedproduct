<?php namespace App\Http\Controllers;

use App\Lowongan;
use App\NilaiProfilMatching;
use App\Http\Requests;
use App\Http\Requests\LowonganRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Jabatan;
use App\LulusSyarat;

class LowonganController extends Controller {

	public function index()
	{
		$lj= Lowongan::all();
		return view('lowongan.index', compact('lj'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{	
		$jabatan = Jabatan::lists('nama','id');
		return view('lowongan.create')
		->with('jabatan',$jabatan);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, Lowongan $lowongan)
	{
		//

		$lowongan->createAll($request->all()); // menyimpan semua data lowongan dg relasi nya
		
		return redirect()->route('lowongan.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$kandidat = LulusSyarat::where('id_lowongan','=',$id)->get();
		$hasil = NilaiProfilMatching::where('id_lowongan','=',$id)->get();
		
		$lowongan=Lowongan::findOrFail($id);
		return view('lowongan.show')
		->with('lowongan',$lowongan)
		->with('hasil',$hasil)
		->with('kandidat',$kandidat);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$jabatan = Jabatan::lists('nama','id');
		$lowongan=Lowongan::findOrFail($id);
		return view('lowongan.edit')->with("lowongan",$lowongan)
		->with('jabatan',$jabatan);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id, Lowongan $lowongan)
	{
		$lowongan->updateAll($request->all(), $id);
		return redirect()->route('lowongan.index');
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
		Lowongan::findOrFail($id)->delete();
		return redirect()->route('lowongan.index');
	}

	public function datatables(){
		$lj = Lowongan::all();
		$data=array();
		$l=array();
		$i=0;
		foreach ($lj as $value) {
			$l[0] = $value->jabatan->nama;
			$l[1] = $value->kode;
			$l[2] = "
				<a href='".route('lowongan.edit',$value->id)."' >Edit</a> - 
				<a href='".route('lowongan.destroy',$value->id)."' data-method = 'DELETE' data-confirm='yakin untuk menghapus?' >Hapus</a> - 
				<a href='".route('lowongan.show',$value->id)."'>Proses Seleksi</a>
			";

			$data[$i]=$l;
			$i++;
		}

		$return['data'] = $data;
		return response()->json($return);
	}

}
