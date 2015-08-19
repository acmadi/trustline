<?php namespace App\Http\Controllers;

use App\Http\Requests\CreatePerusahaanRequest;
use App\Perusahaan;
use App\MataUang;
use Illuminate\Http\Request;

class PerusahaanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$perusahaan = Perusahaan::first();
		$mata_uangs = MataUang::get();
		if ($perusahaan == null) {
			$perusahaan = new Perusahaan;
		}
		return view('perusahaan.create', compact('perusahaan', 'mata_uangs'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreatePerusahaanRequest $request)
	{
		$perusahaan = Perusahaan::firstOrNew([]);
		$perusahaan->fill($request->all());
		$perusahaan->save();
		return redirect('perusahaan');
	}
}
