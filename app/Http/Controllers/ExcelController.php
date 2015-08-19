<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\ExcelHelper;
use Request;

class ExcelController extends Controller {

	protected $excelHelper;

	public function __construct(ExcelHelper $excelHelper)
	{
		$this->excelHelper = $excelHelper;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('excel.input');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function handle() {
		$all = Request::all();
		$table = [];
		if (sizeof($all)) {
			//echo '<pre>';
			$file = $all['file'];
			$data['data'] = $file;
			$table = $this->excelHelper->toArray($file);
		}
		return view('excel.table', compact('table', 'filename'));
	}
}
