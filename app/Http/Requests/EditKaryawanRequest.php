<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Response;
class EditKaryawanRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

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
			'telepon' => 'required',
			'hp' => 'required',
			'tahun_masuk' => 'required',
			'id_jabatan' => 'required'
		];
	}

}
