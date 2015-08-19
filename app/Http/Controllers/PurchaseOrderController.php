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

class PurchaseOrderController extends Controller {

	protected $pr;
	protected $po;
	protected $supplier;
	protected $oi;

	public function __construct(PurchaseRequisition $pr, PurchaseOrder $po, Supplier $s, OrderedItem $oi)
	{
		$this->pr = $pr;
		$this->po = $po;
		$this->supplier = $s;
		$this->oi = $oi;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = $this->po->get(['id', 'tanggal', 'catatan']);
		return view('pembelian.po.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$id = $this->po->max('id');
		$id = $id === null ? 1 : $id + 1;
		$supplier = $this->supplier->get(['id', 'nama'])->toArray();
		$pr = $this->pr->get(['id'])->toArray();
		$terms = SyaratPembayaran::all()->toArray();
        $pajak = Pajak::all()->toArray();
		$akun = Akun::all()->toArray();
		return view('pembelian.po.create', compact('supplier', 'terms', 'pr', 'id', 'pajak','akun'));
	}

	/**
	 * Return barang di PR tertentu
	 *
	 * @param $id pr
	 *
	 * @return string json
	 */
	public function prjson($id) {
		$pr = $this->pr->find($id);
		$pivot = $pr->barangs()->get(['nama'])->toArray();
		// dd($pivot);
		return json_encode($pivot);
		// dd(json_encode($pivot));
	}

	public function alamatjson($id){
		$s = $this->supplier->find($id);
		return json_encode($s['alamat']);
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

		$poFill = $this->po->getFillable();
		$po = $this->po->firstOrCreate($request->only($poFill));

		foreach($all['popr'] as $item) {
			$requested_item_id = array_pull($item, 'requested_item_id');
			$po->requestedItems()->attach($requested_item_id, $item);
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
		$po = $this->po->with('orderedItems','requestedItems')->find($id);
		$subtotal = 0;
		foreach($po->orderedItems as $item) {
			$subtotal += $item->amount;
		}
//		$nama = $po['requested_items']->get(['nama'])->toArray();
//		 $pivot = $po->orderedItems();
//		 $barang = $pivot->requestedItem()->barang();
//		 $pivot = $pivot->toArray();
//		$size = count($po['requested_items']);
//		for($i=0;$i<count($po['requested_items']);$i++):
//			$nama[$i] = Barang::find($po['requested_items'][$i]['barang_id']);
//		endfor;
//		$pr = $po->orderedItems;
//		dd($subtotal);

		return view('pembelian/po/show',compact('po','subtotal'));
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
