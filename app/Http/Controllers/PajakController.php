<?php namespace App\Http\Controllers;

use App\Akun;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePajakRequest;

use App\Pajak;
use Illuminate\Http\Request;

class PajakController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Pajak::all()->toArray();
//		dd($data);
		return view('pajak.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$akun = Akun::all()->toArray();
		return view('pajak.create', compact('akun'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreatePajakRequest $request)
	{
		$fill = $request->all();
//		dd($fill);
		Pajak::create($fill);
		return redirect('pajak');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = Pajak::find($id);
		return view('pajak.show', compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$akun = Akun::all()->toArray();
		$data = Pajak::find($id);
		return view('pajak.edit', compact('data','akun'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$fill = $request->all();
		Pajak::find($id)->update($fill);
		return redirect('pajak');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pajak = Pajak::find($id);
		$pajak->delete();
		return redirect('pajak');
	}

}
