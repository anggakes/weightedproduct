<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\HttpResponse;

use DB;
use App\Kriteria;

class KriteriaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$kriteria = Kriteria::all();
		return view('kriteria.index')
		->with('kriteria',$kriteria);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// under construction
		return view('kriteria.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// under construction
		DB::transaction(function()use($request){
			
			$kriteria = Kriteria::create($request->input('kriteria'));
			$insert = array();
			foreach ($request->input('nilai_kriteria') as $key => $value) {
				$insert []= [
					'id_kriteria' => $kriteria->id,
					'bobot' => $key,
					'batas_atas' => $value['batas_atas'],
					'batas_bawah' => $value['batas_bawah']
				];
			}
			
			;
		});
		
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$kriteria = Kriteria::findOrFail($id);
		return view('kriteria.show')
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
	}

}
