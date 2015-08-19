<?php namespace App\Http\Requests;

use Response;
use App\Http\Requests\Request;
use Auth;

class CreatePerusahaanRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nama' => 'required',
			'alamat' => 'required',
			'kota' => 'required',
			'propinsi' => 'required',
			// 'kode_pos' => 'required',
			'telepon' => 'required',
			// 'fax' => 'required',
			// 'no_akte_pendirian' => 'required',
			// 'npwp' => 'required',
			// 'no_pengukuhan' => 'required',
			// 'no_seri_faktur_pajak' => 'required',
			// 'kode_cabang' => 'required',
			// 'jenis_usaha' => 'required',
			// 'klu' => 'required',
			'tanggal_neraca_awal' => 'required',
			'nilai_tukar_neraca_awal' => 'required',
			'tahun_buku_fiskal'=> 'required',
			'mata_uang' => 'required',
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
