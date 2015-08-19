<?php namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Response;
use Storage;

class FileController extends Controller {

	public function get($id, $name = "") {
		$entry = File::find($id);
		$file = Storage::disk('local')->get($entry->saved_name);

		return (new Response($file, 200))
				->header('Content-Type', $entry->mime);
	}

}
