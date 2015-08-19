<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class File extends Model {

	public $timestamps = false;
	protected $guarded = [];
	protected $appends = ['path'];
	protected $download_path = 'storage/upload/';

}
