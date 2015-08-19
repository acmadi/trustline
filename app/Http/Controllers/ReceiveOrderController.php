<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateRoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ReceiveOrder;
use App\PurchaseOrder;
use App\ReceivedItem;
use App\OrderedItem;
use App\Supplier;
use App\Gudang;

class ReceiveOrderController extends Controller {

	protected $ro;
	protected $po;
	protected $ri;
	protected $oi;
	protected $supplier;

	public function __construct(ReceiveOrder $ro, PurchaseOrder $po, ReceivedItem $ri, OrderedItem $oi, Supplier $s)
	{
		$this->ro = $ro;
		$this->po = $po;
		$this->ro = $ro;
		$this->oi = $oi;
		$this->supplier = $s;
	}

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
		$id = $this->ro->max('id');
		$id = $id === null ? 1 : $id + 1;
		// $barang = Barang::all()->toArray();
		$po = $this->po->get()->toArray();
		// dd($po);
		// $barang_json = json_encode($barang);
		$gudang = Gudang::all()->toArray();
		// dd($gudang);
		$supplier = $this->supplier->get(['id', 'nama'])->toArray();
		$data = compact('id', 'po', 'barang_json', 'supplier', 'gudang');
		return view('pembelian.ro.create', $data);
	}

	/**
	 * Return PO di PO tertentu
	 *
	 * @param $id po
	 *
	 * @return string json
	 */
	public function prjson($id) {
		$po = $this->po->with('orderedItems.requestedItem.barang')->find($id)->toArray();
		// $po = $this->po->with('orderedItems')->find($id)->toArray();
		// dd($po);
		return json_encode($po);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$all = $request->all();
//		dd($all);

		$roFill = $this->ro->getFillable();
		$ro = $this->ro->firstOrCreate($request->only($roFill));

		foreach($all['poro'] as $item) {
			$received_item_id = array_pull($item, 'received_item_id');
			$ro->requestedItems()->attach($requested_item_id, $item);
		}
		return redirect('pembelian/po');
		//dd($po->toArray());
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
