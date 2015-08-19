<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePrRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			
		];

		foreach($this->request->get('barpo') as $key => $val) {
			$rules['barpo.' . $key . '.tanggal_butuh'] = 'required|date';
		}

		foreach($this->request->get('barpo') as $key => $val) {
			$rules['barpo.' . $key . '.kuantitas'] = 'regex:/^[0-9]*[1-9][0-9]*$/';
		}

		return $rules;
	}

}
