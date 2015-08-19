<?php namespace App\Http\Controllers;

use App\Barang;
use App\Http\Requests\CreateBarangRequest;
use App\Http\Requests\EditBarangRequest;
use App\Saldo;
use App\Services\ExcelHelper;
use App\Services\FileUpload;
use App\TipeBarang;
use Request;


class BarangController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Barang::get([
			'id',
			'nama',
			'tipebarang',
			'harga_jual1',
			'harga_jual2',
		])->toArray();
		//return view('pre', compact('data'));
		return view('barang.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$saldo = Saldo::all()->toArray();
		return view('barang.create', compact('saldo'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateBarangRequest $request)
	{
		$fill = $request->all();
		$barang = Barang::create($fill);
		
		$file = FileUpload::upload($request->file('gambar'));
		if ($file != null) {
			$barang->gambar_id = $file->id;
			$barang->save();
		}

		return redirect('barang');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$barang = Barang::find($id);
		return view('barang.show', compact('barang'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = Barang::find($id)->toArray();
		//dd($data);
		return view('barang.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditBarangRequest $request, $id)
	{
		$fill = $request->all();

		Barang::find($id)->update($fill);
		return redirect('barang');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$barang = Barang::find($id);
		$barang->delete();
		return redirect('barang');
	}

	/**
	 * Get an excel table template.
	 *
	 * @return Response
	 */
	public function template() {
		return ExcelHelper::template(new Barang());
	}

	/**
	 * Get an excel table template.
	 *
	 * @return Response
	 */
	public function import() {
		return view('barang.import');
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

			$barang = Barang::find($value['id'])->first();
			if ($barang == null) {
				$barang = new Barang();

				/* fill tipe barang MASIH HARUS DIBENERIN*/
				$tipebarang = $value['tipebarang'];
				// $tipebarang = TipeBarang::find($tipebarang);
				// if ($tipebarang == null) {
				// 	$tipebarang = ucwords(strtolower($tipebarang));
				// 	$tipebarang = TipeBarang::firstOrCreate(['nama' => $tipebarang]);
				// 	$tipebarang = $tipebarang->id;
				// }
				$value['tipebarang'] = $tipebarang;

				/* fill numeric awal */
				if (!is_numeric($value['nilai_persediaan_awal'])) {
					$value['nilai_persediaan_awal'] = 0;
				}
				if (!is_numeric($value['harga_jual1'])) {
					$value['harga_jual1'] = 0;
				}
				if (!is_numeric($value['harga_jual2'])) {
					$value['harga_jual2'] = 0;
				}
				if (!is_numeric($value['harga_jual3'])) {
					$value['harga_jual3'] = 0;
				}
				if (!is_numeric($value['harga_jual4'])) {
					$value['harga_jual4'] = 0;
				}
				if (!is_numeric($value['harga_jual5'])) {
					$value['harga_jual5'] = 0;
				}
				if (!is_numeric($value['saldo_minimum'])) {
					$value['saldo_minimum'] = 0;
				}

				/* correct status */
				$status = strtolower($value['status']);
				if ($status != 'aktif' && $status != 'non aktif') {
					$status = 'aktif';
				}
				$value['status'] = $status;

				/* finally */
				$barang->fill($value);
				$barang->save();
				// dd($barang);
			}
		}
		return redirect('barang');
	}

	/**
	 * Get an excel table export.
	 *
	 * @return Response
	 */
	public function export() {
		$barang = new Barang();
		$barangs = $barang->get($barang->getFillable());
		$barangs = $barangs->toArray();
		if ($barangs == []) {
			return view('barang.export');
		}
		return ExcelHelper::export($barangs, 'barangs');
	}

}
