<?php namespace App\Services;

use Excel;
use File;
use Illuminate\Database\Eloquent\Model;

/**
* Helper class for Excel
*/
class ExcelHelper {

	/**
	 * Convert excel file to array. Excel file requirements:
	 *  - must be only 1 sheet.
	 *  - first row contains resulted array keys.
	 * Example of Excel file:
	 *  +----+---------+
	 *  | No | Name    |
	 *  | 1  | Abdul   |
	 *  | 2  | John    |
	 *  +----+---------+
	 * will produce:
	 *   array(
	 *       1 => array('No' => 1, 'Name' => 'Abdul'),
	 *       2 => array('No' => 2, 'Name' => 'John')
	 *   )
	 *
	 * @param Symfony\Component\HttpFoundation\File\UploadedFile
	 * @return Array
	 */
	public static function import($file) {
		if ($file == NULL) {
			return [];
		}
		$tempPath = public_path() . '/temp';

		$ext = $file->getClientOriginalExtension();

		// create a copy file
		$name = str_random(20) . '.' . $ext;
		$file->move($tempPath, $name);

		$perfectPath = $tempPath . '/' . $name;
		$sheet = Excel::selectSheetsByIndex(0)->load($perfectPath)->get();
		$array = $sheet->toArray();

		// remove the file after processed
		File::delete($perfectPath);

		return $array;
	}

	/**
	 * Convert array to excel file. Array requirements:
	 *  - first dimension shoud contain how many 
	 *    records/rows.
	 *  - second dimension should contain columns of
	 *    each row, with array keys and values.
	 * Example of array:
	 *   array(
	 *       1 => array('No' => 1, 'Name' => 'Abdul'),
	 *       2 => array('No' => 2, 'Name' => 'John')
	 *   )
	 * will produce:
	 *  +----+---------+
	 *  | No | Name    |
	 *  | 1  | Abdul   |
	 *  | 2  | John    |
	 *  +----+---------+
	 *
	 * @param Array of data
	 * @param String|null file name
	 * @param String|null sheet name
	 * @return File|null excel
	 */
	public static function export($array, $filename='e', $sheetname='s') {
		if ($array==[]) $array = [''];
		if (!is_array($array)) {
			//echo 'not an array<br>';
			return;
		} else if (!is_array($array[0])) {
			//echo 'not a two-dimensional array<br>';
			return;
		}

		$excel = Excel::create($filename);
		$excel->sheet($sheetname, function($sheet) use($array) {
			$sheet->fromArray($array);
			/* harus dibenerin lagi *
			$c = chr(ord('A') + count($array[0]) - 1);
			$n = count($array) + 1;
			$range = 'A1:' . $c . $n;
			$sheet->setBorder($range, 'thin');
			//*/
		});
		return $excel->export('xls');
	}

	/**
	 * Convert a one-dimensional keyless array to a
	 * two-dimensional array. If the given array is
	 * not a one-dimensional array, it returns null.
	 *
	 * @param Array
	 * @return Array|null
	 */
	public static function upgrade($array) {
		if (!is_array($array) || $array == []) {
			return null;
		} else if (is_array($array[0])) {
			return null;
		}

		$ans = [];
		$ans[0] = [];
		foreach ($array as $key => $value) {
			$ans[0][$value] = '';
		}
		return $ans;
	}

	/**
	 * Create an Excel file to help user fill the
	 * table to import.
	 *
	 * @param Model that instanced
	 * @return File excel
	 */
	public static function template(Model $model) {
		$fillable = $model->getFillable();
		foreach ($fillable as $key => $value) {
			$fillable[$key] = ucwords(str_replace('_', ' ', $value));
		}
		$upgrades = ExcelHelper::upgrade($fillable);
		return ExcelHelper::export($upgrades, $model->getTable());
	}

}
