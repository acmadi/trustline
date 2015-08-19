<?php namespace App\Http\Controllers;

use App\Barang;
use App\Batch;
use App\Gudang;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateSaldoRequest;
use App\Saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Saldo::get([
			'id',
			'gudang_id',
			'tanggal',
			'hpp_satuan',
			'kuantitas'
		])->toArray();
		$gudang = DB::table('gudangs');
		//$barang = Barang::all()->toArray();
		return view('saldo.index', compact('data','gudang'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$gudang = Gudang::all()->toArray();
		$batch = Batch::all()->toArray();
		$barang = Barang::all()->toArray();
		return view('saldo.create', compact('gudang','batch','barang'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateSaldoRequest $request)
	{
		$data = $request->all();
		if ($data['pilihan'] == 'baru') {
			$fill['serial'] = $data['serial'];
			$fill['barang_id'] = $data['barang_id'];
			$fill['kadaluwarsa'] = $data['kadaluwarsa'];
			$fill['volume'] = $data['volume'];
			$fill['berat'] = $data['berat'];
//			$fill['gambar'] = $data['gambar'];
			$batch = Batch::create($fill);
			$fill2['batch_id'] = $batch->id;
		}
		else
		{
			$fill2['batch_id'] = $data['batch_id'];
		}
		$fill2['gudang_id'] = $data['gudang_id'];
		$fill2['tanggal'] = $data['tanggal'];
		$fill2['nomor_bukti'] = $data['nomor_bukti'];
		$fill2['kuantitas'] = $data['kuantitas'];
		$fill2['hpp_satuan'] = $data['hpp_satuan'];
		Saldo::create($fill2);
		return redirect('saldo');
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
		$data = Saldo::find($id);
		$gudang = Gudang::all()->toArray();
		$barang = Barang::all()->toArray();
		$batch = Batch::all()->toArray();
		return view('saldo.edit', compact('data','barang','gudang','batch'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
//		dd($request);
		$saldo = Saldo::find($id);
		$data = $saldo->getFillable();
		$willupdate = $request->only($data);
		if($willupdate['batch_id'] == null)
		{
			$willupdate['batch_id'] = Batch::max('id') + 1 ;
		}
		Saldo::find($id)->update($willupdate);
		return redirect('saldo');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$saldo = Saldo::find($id);
		$saldo->delete();
		return redirect('saldo');
	}

}
