<?php namespace App\Services;

use App\File;
use App\Services\MimeTypeGuesser;

class FileUpload {

	/**
	 * Upload and save file description.
	 *
	 * @param Symfony\Component\HttpFoundation\File\UploadedFile
	 * @return App\File
	 */
	public static function upload($uploadedFile) {
		if ($uploadedFile != null) {
			$ext = $uploadedFile->getClientOriginalExtension();
			$saved_name = str_random(20) . '.' . $ext;
			$uploadedFile->move(storage_path() . '/upload', $saved_name);

			// we should save this file information in database
			$name = $uploadedFile->getClientOriginalName();
			$ext = $uploadedFile->getClientOriginalExtension();
			$mime = (new MimeTypeGuesser)->guess($ext);
			$size = $uploadedFile->getClientSize();

			$file = compact('saved_name', 'name', 'mime', 'size');
			$file = new File($file);
			$file->save();
			return $file;
		}

		return null;
	}

}