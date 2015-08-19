<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Sales;
use App\Http\Requests\CreateSalesRequest;

use Illuminate\Http\Request;

class SalesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Sales::with('karyawan')->get()->toArray();
//		dd($data);
		return view('sales.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$karyawans = Karyawan::jabatSales()->get(['id', 'nama'])->toArray();
		return view('sales.create', compact('karyawans'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateSalesRequest
	 * @return Response
	 */
	public function store(CreateSalesRequest $request)
	{
		Sales::create($request->all());
		return redirect('sales');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = Sales::find($id);
		$karyawan = Karyawan::find($data['id_karyawan']);
		return view('sales.show', compact('data','karyawan'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Sales::with('karyawan')->find($id)->toArray();
		//dd($data);
		return view('sales.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateSalesRequest $request, $id)
	{
		Sales::find($id)->update($request->except('id_karyawan'));
		return redirect('sales');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Sales::find($id)->delete();
		return redirect('sales');
	}

}
