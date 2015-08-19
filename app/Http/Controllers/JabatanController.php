<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateJabatanRequest;

use App\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = Jabatan::all()->toArray();
        return view('jabatan.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('jabatan.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateJabatanRequest $request)
	{
        $value = $request->only(['nama']);
        $value['nama'] = ucwords(strtolower($value['nama']));
        Jabatan::firstOrCreate($value);
        return redirect('jabatan');
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
        $data = Jabatan::find($id)->toArray();
        //dd($data);
        return view('jabatan.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateJabatanRequest $request, $id)
	{
        Jabatan::find($id)->update($request->all());
        return redirect('jabatan');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $jabatan = Jabatan::find($id);
        $jabatan->delete();
        return redirect('jabatan');
	}

}
