<?php namespace App\Http\Requests;

use Response;
use App\Http\Requests\Request;
use Auth;

class CreateBarangRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id' => 'required|unique:barangs,id',
//			'barkode_barang' => 'required',
			'nama' => 'required',
			'satuan'=> 'required',
			'tipebarang'=> 'required',
			'harga_jual1' => 'required',
			'kontrol_satuan' => 'required',
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

}
