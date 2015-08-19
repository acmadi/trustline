<?php namespace App\Http\Controllers;

use App\Akun;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGudangRequest;
use App\Http\Requests\EditGudangRequest;

use Illuminate\Http\Request;
use App\Gudang;

class GudangController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Gudang::get([
				'id',
				'nama',
				'kota',
				'status',
			])->toArray();
		//return view('pre', compact('data'));
		return view('gudang.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$akun = Akun::all()->toArray();
		return view('gudang.create', compact('akun'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateGudangRequest $request)
	{
		Gudang::create($request->all());
		return redirect('gudang');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = Gudang::find($id);
		if ($data == NULL) {
			$data = [];
		} else {
			$data = $data->toArray();
		}
		return view('gudang.show', compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Gudang::find($id);
        $akun = Akun::all()->toArray();
        return view('gudang.edit',compact('data','akun'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditGudangRequest $request, $id)
	{
		$fill = $request->all();
        Gudang::find($id)->update($fill);
        return redirect('gudang');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$gudang = Gudang::find($id);
		$gudang->delete();
		return redirect('gudang');
	}

}
