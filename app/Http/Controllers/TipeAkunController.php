<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipeAkun;
use App\Http\Requests\CreateTipeAkunRequest;
use App\Services\ExcelHelper;

use Request;

class TipeAkunController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = TipeAkun::all()->toArray();
		return view('tipeakun.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipeakun.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateAkunRequest
	 * @return Response
	 */
	public function store(CreateTipeAkunRequest $request)
	{
		$value = $request->only(['nama']);
		$value['nama'] = ucwords(strtolower($value['nama']));
		TipeAkun::firstOrCreate($value);
		return redirect('tipeakun');
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

	public function destroy($id)
	{
		TipeAkun::find($id)->delete();
		return redirect('tipeakun');
	}

	/**
	 * Get an excel table template.
	 *
	 * @return Response
	 */
	public function template() {
		return ExcelHelper::template(new TipeAkun());
	}

	/**
	 * Get an excel table template.
	 *
	 * @return Response
	 */
	public function import() {
		return view('tipeakun.import');
	}

	/**
	 * Submit excel file to database.
	 *
	 * @return Response
	 */
	public function upload() {
		$all = Request::all();
		$file = $all['file'];
		$data['data'] = $file;
		$table = ExcelHelper::import($file);
		foreach ($table as $key => $value) {
			foreach ($value as $j => $k) {
				if ($k === null) {
					$value[$j] = '';
				}
			}

			$value['nama'] = ucwords(strtolower($value['nama']));
			$tipeakun = TipeAkun::firstOrCreate(['nama' => $value['nama']]);
		}
		return redirect('tipeakun');
	}

	/**
	 * Get an excel table export.
	 *
	 * @return Response
	 */
	public function export() {
		$tipeakun = new TipeAkun();
		$tipeakuns = $tipeakun->get($tipeakun->getFillable());
		$tipeakuns = $tipeakuns->toArray();
		if ($tipeakuns == []) {
			return view('tipeakun.export');
		}
		return ExcelHelper::export($tipeakuns, 'tipeakuns');
	}

}
