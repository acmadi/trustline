<?php namespace App\Http\Controllers;

use App\Barang;
use App\Batch;
use App\Gudang;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateBatchRequest;
use Illuminate\Http\Request;

class BatchController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Batch::get([
			'id',
			'serial',
			'kadaluwarsa',
			'volume',
			'gambar'
		])->toArray();
		//return view('pre', compact('data'));
		return view('batch.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$barang = Barang::all()->toArray();
		return view('batch.create',compact('barang'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateBatchRequest $request)
	{
		//dd($request->all());

		Batch::create($request->all());
		return redirect('batch');
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
		$batch = Batch::find($id);
		$batch->delete();
		return redirect('batch');
	}

}
