<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Barang;
use App\PurchaseRequisition;
use App\RequestedItem as BarangPo;
use App\Http\Requests\CreatePrRequest;

class PurchaseRequisitionController extends Controller {

	protected $barang;
	protected $pr;
	protected $barPo;

	public function __construct(Barang $barang, PurchaseRequisition $pr, BarangPo $bp)
	{
		$this->barang = $barang;
		$this->pr = $pr;
		$this->barPo = $bp;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = $this->pr->get(['id', 'tanggal', 'catatan']);
		return view('pembelian.pr.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$barang = $this->barang->get()->toArray();
		return view('pembelian.pr.create', compact('barang'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreatePrRequest $request)
	{
		$all = $request->all();
		// dd($all['barpo']);

		$prFill = $this->pr->getFillable();
		$pr = $this->pr->firstOrCreate($request->only($prFill));

		// dd($all);
		foreach($all['barpo'] as $barpo) {
			$barang_id = array_pull($barpo, 'barang_id');
			$pr->barangs()->attach($barang_id, $barpo);
		}
		return redirect('pembelian/pr');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pr = $this->pr->find($id);
		// $pivot = $pr->barangs()->get(['nama'])->toArray();
		// $pr = $pr->toArray();
		// dd(compact('pr','pivot'));
		return view ('pembelian/pr/show',compact('pr'));
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
