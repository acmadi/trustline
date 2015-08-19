<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\EditSupplierRequest;
class SupplierController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Supplier::get([
			'id',
			'nama',
			'alamat',
			'telepon1',
			'contact_person',
			'telepon1_cp'
		])->toArray();
		//return view('pre', compact('data'));
		return view('supplier.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pajak = Pajak::all();
		return view('supplier.create', compact('pajak'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateSupplierRequest $request)
	{
		Supplier::create($request->all());
		return redirect('supplier');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = Supplier::find($id);
		if ($data == NULL) {
			$data = [];
		} else {
			$data = $data->toArray();
		}
		return view('supplier.show', compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Supplier::find($id)->toArray();
        return view('supplier.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditSupplierRequest $request, $id)
	{
		$fill = $request->all();
        Supplier::find($id)->update($fill);
        return redirect('supplier');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$supplier = Supplier::find($id);
		$supplier->delete();
		return redirect('supplier');
	}

}
