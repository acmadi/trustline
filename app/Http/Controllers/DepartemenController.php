<?php namespace App\Http\Controllers;
use App\Departemen;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DepartemenController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Departemen::all()->toArray();
		return view('departemen.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$id = Departemen::max('id');
		$id = $id === null ? 1 : $id + 1;
		return view('departemen.create', compact('id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$fill = $request->all();
		Departemen::create($fill);
		return redirect('departemen');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = Departemen::find($id)->toArray();
		return view('departemen.show', compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Departemen::find($id)->toArray();
		return view('departemen.edit', compact('data'));
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
		Departemen::find($id)->update($fill);
		return redirect('departemen');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Departemen::find($id)->delete();
		return redirect('departemen');
	}

}
