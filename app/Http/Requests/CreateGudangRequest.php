<?php namespace App\Http\Requests;

use Response;
use App\Http\Requests\Request;
use Auth;

class CreateGudangRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [ 
			'id' => 'required|unique:gudangs,id'
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
