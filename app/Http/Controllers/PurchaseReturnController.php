<?php namespace App\Http\Controllers;

use App\Akun;
use App\Barang;
use App\Pajak;
use App\PurchaseRequisition;
use App\PurchaseOrder;
use App\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePoRequest as Request;
use App\OrderedItem;
use App\SyaratPembayaran;

class PurchaseReturnController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// $id = $this->po->max('id');
		// $id = $id === null ? 1 : $id + 1;
		$supplier = Supplier::get(['id', 'nama'])->toArray();
		// $pr = $this->pr->get(['id'])->toArray();
		// $terms = SyaratPembayaran::all()->toArray();
        $pajak = Pajak::all()->toArray();
		// $akun = Akun::all()->toArray();
		return view('pembelian.pt.create', compact('supplier','pajak'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
