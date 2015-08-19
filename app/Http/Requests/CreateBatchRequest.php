<?php namespace App\Http\Requests;

use Response;
use App\Http\Requests\Request;
use Auth;
class CreateBatchRequest extends Request {

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
//			'nomor_seri' => 'required',
//			'kadaluwarsa' => 'required',
//			'volume_berat' => 'required'
		];
	}

}
