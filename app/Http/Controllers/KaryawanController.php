<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Jabatan;
use Illuminate\Http\Request;
use App\Http\Requests\CreateKaryawanRequest;
use App\Http\Requests\EditKaryawanRequest;
use App\Services\ExcelHelper;

class KaryawanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Karyawan::with('jabatan')->get([
			'id',
			'nama',
			'id_jabatan',
			'tahun_masuk',
			'gaji_pokok',
		])->toArray();
		return view('karyawan.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$jabatans = Jabatan::all()->toArray();
		return view('karyawan.create', compact('jabatans'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateKaryawanRequest $request)
	{
		$kar = Karyawan::create($request->all());
		return redirect('karyawan');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id = 0)
	{
		$data = Karyawan::with('jabatan')->find($id);
		if ($data == NULL) {
			$data = [];
		} else {
			$data = $data->toArray();
		}
		return view('karyawan.show', compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Karyawan::find($id)->toArray();
		$jabatans = Jabatan::all()->toArray();
		//dd($data);
		return view('karyawan.edit', compact('data', 'jabatans'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditKaryawanRequest $request, $id)
	{
		Karyawan::find($id)->update($request->all());
		return redirect('karyawan');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$karyawan = Karyawan::find($id);
		$karyawan->delete();
		return redirect('karyawan');
	}

	public function export() {
		$karyawan = new Karyawan();
		//$karyawan->count() handle if count 0
		$karyawans = Karyawan::get($karyawan->getFillable())->toArray();
		return ExcelHelper::export($karyawans);
	}

}
