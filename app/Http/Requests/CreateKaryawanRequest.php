<?php namespace App\Http\Requests;

use Response;
use App\Http\Requests\Request;
use Auth;

class CreateKaryawanRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id' => 'required',
			'nama' => 'required',
			'alamat' => 'required',
			'kota' => 'required',
			'propinsi' => 'required',
			'telepon' => 'required',
			'hp' => 'required',
			'tahun_masuk' => 'required',
			'id_jabatan' => 'required'
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
