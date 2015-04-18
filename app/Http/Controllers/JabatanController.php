<?php namespace App\Http\Controllers;


use App\Jabatan;
use App\Divisi;
use App\Http\Requests;
use App\Http\Requests\LowonganRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use DB;

class JabatanController extends Controller {

	public function index()
	{
		$lj= Jabatan::all();
		return view('jabatan.index', compact('lj'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{	
		$divisi = Divisi::lists('nama','id');
		return view('jabatan.create')->with('divisi',$divisi);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//

		DB::transaction(function()use($request){

			$divisi = $request->input('divisi');
			$jabatan = Jabatan::create(['nama'=>$request->input('nama')]);
			foreach ($divisi as $key => $value) {
				$insert[] = [
					'id_jabatan'=>$jabatan->id,
					'id_divisi'=>$value
				];
			}

			DB::table('jabatan_divisi')->insert($insert);
		
		});
		
		return redirect()->route('jabatan.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$jb=Jabatan::findOrFail($id);
		$divisi = Divisi::lists('nama','id');
		$selected = array();
		foreach ($jb->divisi as $key => $value) {
			$selected[] = $value->id;
		}
		return view('jabatan.edit')
		->with("jabatan",$jb)
		->with('divisi',$divisi)
		->with('selected',$selected);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		DB::transaction(function()use($request, $id){

			$divisi = $request->input('divisi');
			$jabatan = Jabatan::findOrFail($id)->update(['nama'=>$request->input('nama')]);
			foreach ($divisi as $key => $value) {
				$insert[] = [
					'id_jabatan'=>$id,
					'id_divisi'=>$value
				];
			}
			DB::table('jabatan_divisi')->where('id_jabatan','=',$id)->delete();
			DB::table('jabatan_divisi')->insert($insert);
		
		});
		return redirect()->route('jabatan.index');
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
		Jabatan::findOrFail($id)->delete();
		return redirect()->route('jabatan.index');
	}

	public function datatables(){
		$lj = Jabatan::all();
		$data=array();
		$l=array();
		$i=0;
		foreach ($lj as $value) {
			$l[0] = $value->nama;
			$d='';
			foreach ($value->divisi as $key => $v) {
				$d .= "<span class='label label-warning'>$v->nama</span> ";
			}
			$l[1] = $d;
			$l[2] = "
				<a href='".route('jabatan.edit',$value->id)."' >Edit</a> - 
				<a href='".route('jabatan.destroy',$value->id)."' data-method = 'DELETE' data-confirm='yakin untuk menghapus?' >Hapus</a>
			";

			$data[$i]=$l;
			$i++;
		}

		$return['data'] = $data;
		return response()->json($return);
	}

}
