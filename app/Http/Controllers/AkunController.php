<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Services\ExcelHelper;
use App\Http\Requests\CreateAkunRequest;
use App\Http\Requests\EditAkunRequest;

use App\Akun;
use App\MataUang;
use App\TipeAkun;

class AkunController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$akuns = Akun::with('tipeakun')->get()->toArray();
		//dd($akuns);
		return view('akun.index', compact('akuns'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$currencies = MataUang::get(['simbol', 'nama'])->toArray();
		$tipeakuns = TipeAkun::get(['id', 'nama'])->toArray();
		return view('akun.create', compact('currencies', 'tipeakuns'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateAkunRequest $request)
	{
		$post = $request->all();
		$akun = new Akun();
		$akun->fill($post);
		$akun->save();
		return redirect('akun');
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
		$data = Akun::find($id)->toArray();
		$tipeakuns = TipeAkun::all()->toArray();
		$currencies = MataUang::all()->toArray();
		return view('akun.edit',compact('data','tipeakuns','currencies'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditAkunRequest $request, $id)
	{
		$data = $request->all();
		Akun::find($id)->update($data);
		return redirect('akun');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$akun = Akun::find($id);
		$akun->delete();
		return redirect('akun');
	}

	/**
	 * Get an excel table template.
	 *
	 * @return Response
	 */
	public function template() {
		return ExcelHelper::template(new Akun());
	}

	/**
	 * Get an excel table template.
	 *
	 * @return Response
	 */
	public function import() {
		return view('akun.import');
	}

	/**
	 * Submit excel file to database.
	 *
	 * @return Response
	 */
	public function upload() {
		$all = Request::all();
		$file = $all['file'];
		$table = ExcelHelper::import($file);
		foreach ($table as $key => $value) {
			foreach ($value as $j => $k) {
				if ($k === null) {
					$value[$j] = '';
				}
			}

			$akun = Akun::find(['no_akun' => $value['no_akun']])->first();
			if ($akun == null) {
				$akun = new Akun();
				/* fill mata_uang */
				$mata_uang = Currency::find($value['mata_uang']);
				if ($mata_uang == null) continue;
				$value['mata_uang'] = $mata_uang->simbol;

				/* fill tipe akun */
				$id_tipeakun = $value['id_tipeakun'];
				$tipeakun = TipeAkun::find($id_tipeakun);
				if ($tipeakun == null) {
					$id_tipeakun = ucwords(strtolower($id_tipeakun));
					$tipeakun = TipeAkun::firstOrCreate(['nama' => $id_tipeakun]);
					$id_tipeakun = $tipeakun->id;
				}
				$value['id_tipeakun'] = $id_tipeakun;

				/* fill saldo awal */
				if (!is_numeric($value['saldo_awal'])) {
					$value['saldo_awal'] = 0;
				}

				/* fill tanggal */
				if ($value['tanggal'] == null) {
					$value['tanggal'] = date('Y-m-d');
				} else {
					$tanggal = $value['tanggal'];
					$tanggal = date('Y-m-d', strtotime($tanggal));
					$value['tanggal'] = $tanggal;
				}

				/* finally */
				$akun->fill($value);
				$akun->save();
				// dd($akun);
			}
			//dd($akun);
			// $akun = Akun::firstOrCreate(['no_akun' => $value['no_akun']]);
			//$akun
		}
		return redirect('akun');
	}

	/**
	 * Get an excel table export.
	 *
	 * @return Response
	 */
	public function export() {
		// $akun = new Akun();
		// $akun = $akun->get($akun->getFillable());
		// $akun = $akun->toArray();
		// if ($akun == []) {
		// 	return view('akun.export');
		// }
		// return ExcelHelper::export($akun, 'akun');

		$akuns = [];
		foreach (Akun::get() as $akun) {
			$q['No Akun'] = $akun->no_akun;
			$q['Nama'] = $akun->nama;
			$q['Tipe'] = $akun->tipeakun->nama;
			$q['Mata Uang'] = $akun->mata_uang;
			$q['Saldo Awal'] = $akun->saldo_awal;
			$q['Tanggal'] = $akun->tanggal;
			array_push($akuns, $q);
		}
		if ($akuns == []) {
			return view('akun.export');
		}
		return ExcelHelper::export($akuns, 'akun');
	}

}
