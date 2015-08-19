<?php namespace App\Http\Controllers;

use App\MataUang;
use App\Kurs;
use App\Perusahaan;
use Request;
use Validator;

class CurrencyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mata_uangs = MataUang::get();
		return view('currency.index', compact('mata_uangs'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$req = Request::only('simbol', 'nama', 'negara');
		$v = Validator::make($req, [
				'simbol' => 'required',
				'nama' => 'required',
				'negara' => 'required',
			]);
		if ($v->fails()) {
			return redirect()->back()->withErrors($v->errors());
		}
		MataUang::create($req);
		return redirect('currency');
	}

	/**
	 * Nampilin tampilan bikin kurs harian.
	 *
	 * @return Response
	 */
	public function kurs()
	{
		// $default_mata_uang = Perusahaan::first()->mata_uang;
		$default_mata_uang = 'IDR';
		// $mata_uangs = MataUang::where('simbol', '!=', $default_mata_uang);
		// $mata_uangs = $mata_uangs->get();
		$mata_uangs = MataUang::get();

		return view('currency.kurs', compact('mata_uangs', 'default_mata_uang'));
	}

	/**
	 * Nyimpen kurs ke database.
	 *
	 * @return Response
	 */
	public function daily()
	{
		$req = Request::all();
		foreach ($req['kurs'] as $kur) {
			if ((is_numeric($kur['nilai_default']) && $kur['nilai_default'] != 0)
							&& (is_numeric($kur['nilai']) && $kur['nilai'] != 0))
			{
				$kurs = Kurs::firstOrNew([
					'mata_uang'=>$kur['mata_uang'],
					'tanggal' => $req['tanggal']
				]);
				$kurs->nilai_tukar = $kur['nilai_default'] / $kur['nilai'];
				$kurs->save();
				return redirect('currency');
			}
		}
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

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
