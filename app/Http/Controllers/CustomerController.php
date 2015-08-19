<?php namespace App\Http\Controllers;

use App\Customers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pajak;
use App\Sales;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\EditCustomerRequest;

class CustomerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Customers::get([
			'id',
			'nama',
			'alamat',
			'telepon1',
			'contact_person',
			'telepon1_cp'
		])->toArray();
		//return view('pre', compact('data'));
		return view('customer.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$pajak = Pajak::all();
        $sales = Sales::with('karyawan')->get()->toArray();
//        dd($sales);
		return view('customer.create', compact('pajak','sales'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateCustomerRequest $request)
	{
		Customers::create($request->all());
		return redirect('customer');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = Customers::find($id);
		if ($data == NULL) {
			$data = [];
		} else {
			$data = $data->toArray();
		}
		return view('customer.show', compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $data = Customers::find($id)->toArray();
        $sales = Sales::with('karyawan')->get()->toArray();
        return view('customer.edit', compact('data','sales'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditCustomerRequest $request, $id)
	{
		$fill = $request->all();
//        dd($fill);
        Customers::find($id)->update($fill);
        return redirect('customer');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$customer = Customers::find($id);
		$customer->delete();
		return redirect('customer');
	}

}
