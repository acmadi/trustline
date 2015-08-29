<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
| 
| PLIISSSS PLIS PLIS PLIISSS.. Kalau mau nambah route baru, buat juga
| permissionnya. Apa itu? Cek di 
| database/migration/<yyyy>_<mm>_<dd>_<time>_entrust_setup_tables.php
|
*/

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

/* ini buat coba coba doang */
Route::get('excel', 'ExcelController@index');
Route::match(['get', 'post'], 'excel/store', 'ExcelController@handle');

/* File */
Route::get('file/{id}', 'FileController@get');
Route::get('file/{id}/{name}', 'FileController@get');

/* semua route yang butuh auth dimasukkan kesini */
Route::group(['middleware' => ['auth', 'permitted']], function() {
	Route::get('currency', 'CurrencyController@index');
	Route::post('currency', 'CurrencyController@store');
	Route::get('currency/kurs', 'CurrencyController@kurs');
	Route::post('currency/kurs', 'CurrencyController@daily');
	Route::get('currency/show/{id}', 'CurrencyController@show');

	Route::get('akun', 'AkunController@index');
	Route::get('akun/create', 'AkunController@create');
	Route::get('akun/destroy/{id}', 'AkunController@destroy');
	Route::get('akun/edit/{id}', 'AkunController@edit');
	Route::get('akun/export', 'AkunController@export');
	Route::get('akun/import', 'AkunController@import');
	Route::get('akun/show/{id}', 'AkunController@show');
	Route::get('akun/template', 'AkunController@template');
	Route::post('akun/store', 'AkunController@store');
	Route::post('akun/update/{id}', 'AkunController@update');
	Route::post('akun/upload', 'AkunController@upload');

	Route::get('tipeakun', 'TipeAkunController@index');
	Route::get('tipeakun/create', 'TipeAkunController@create');
	Route::get('tipeakun/destroy/{id}', 'TipeAkunController@destroy');
	Route::get('tipeakun/edit/{id}', 'TipeAkunController@edit');
	Route::get('tipeakun/export', 'TipeAkunController@export');
	Route::get('tipeakun/import', 'TipeAkunController@import');
	Route::get('tipeakun/show/{id}', 'TipeAkunController@show');
	Route::get('tipeakun/template', 'TipeAkunController@template');
	Route::post('tipeakun/store', 'TipeAkunController@store');
	Route::post('tipeakun/upload', 'TipeAkunController@upload');

    Route::get('jabatan', 'JabatanController@index');
    Route::get('jabatan/create', 'JabatanController@create');
    Route::get('jabatan/destroy/{id}', 'JabatanController@destroy');
    Route::get('jabatan/edit/{id}', 'JabatanController@edit');
    Route::get('jabatan/show/{id}', 'JabatanController@show');
    Route::post('jabatan/store', 'JabatanController@store');
    Route::post('jabatan/update/{id}', 'JabatanController@update');

	Route::get('perusahaan', 'PerusahaanController@index');
	Route::get('perusahaan/create', 'PerusahaanController@create');
	Route::post('perusahaan/store', 'PerusahaanController@store');

	Route::get('karyawan', 'KaryawanController@index');
	Route::get('karyawan/create', 'KaryawanController@create');
	Route::get('karyawan/destroy/{id}', 'KaryawanController@destroy');
	Route::get('karyawan/edit', 'KaryawanController@edit');
	Route::get('karyawan/edit/{id}', 'KaryawanController@edit');
	Route::get('karyawan/show/{id}', 'KaryawanController@show');
	Route::post('karyawan/store', 'KaryawanController@store');
	Route::post('karyawan/update/{id}', 'KaryawanController@update');

	Route::get('sales', 'SalesController@index');
	Route::get('sales/create', 'SalesController@create');
	Route::get('sales/destroy/{id}', 'SalesController@destroy');
	Route::get('sales/edit', 'SalesController@edit');
	Route::get('sales/edit/{id}', 'SalesController@edit');
	Route::get('sales/show/{id}', 'SalesController@show');
	Route::post('sales/store', 'SalesController@store');
	Route::post('sales/update/{id}', 'SalesController@update');

	Route::get('gudang', 'GudangController@index');
	Route::get('gudang/create', 'GudangController@create');
	Route::get('gudang/destroy/{id}', 'GudangController@destroy');
	Route::get('gudang/show/{id}', 'GudangController@show');
	Route::get('gudang/edit/{id}', 'GudangController@edit');
	Route::post('gudang/store', 'GudangController@store');
	Route::post('gudang/update/{id}', 'GudangController@update');

	Route::get('syaratpembayaran', 'SyaratPembayaranController@index');
	Route::get('syaratpembayaran/create', 'SyaratPembayaranController@create');
	Route::get('syaratpembayaran/destroy/{id}', 'SyaratPembayaranController@destroy');
	Route::get('syaratpembayaran/show/{id}', 'SyaratPembayaranController@show');
	Route::get('syaratpembayaran/edit/{id}', 'SyaratPembayaranController@edit');
	Route::post('syaratpembayaran/store', 'SyaratPembayaranController@store');
	Route::post('syaratpembayaran/update/{id}', 'SyaratPembayaranController@update');

	Route::get('pajak', 'PajakController@index');
	Route::get('pajak/create', 'PajakController@create');
	Route::get('pajak/destroy/{id}', 'PajakController@destroy');
	Route::get('pajak/show/{id}', 'PajakController@show');
	Route::get('pajak/edit/{id}', 'PajakController@edit');
	Route::post('pajak/store', 'PajakController@store');
	Route::post('pajak/update/{id}', 'PajakController@update');

	Route::get('departemen', 'DepartemenController@index');
	Route::get('departemen/create', 'DepartemenController@create');
	Route::get('departemen/destroy/{id}', 'DepartemenController@destroy');
	Route::get('departemen/show/{id}', 'DepartemenController@show');
	Route::get('departemen/edit/{id}', 'DepartemenController@edit');
	Route::post('departemen/store', 'DepartemenController@store');
	Route::post('departemen/update/{id}', 'DepartemenController@update');

	Route::get('proyek', 'ProyekController@index');
	Route::get('proyek/create', 'ProyekController@create');
	Route::get('proyek/destroy/{id}', 'ProyekController@destroy');
	Route::get('proyek/show/{id}', 'ProyekController@show');
	Route::get('proyek/edit/{id}', 'ProyekController@edit');
	Route::post('proyek/store', 'ProyekController@store');
	Route::post('proyek/update/{id}', 'ProyekController@update');

	Route::get('barang', 'BarangController@index');
	Route::get('barang/create', 'BarangController@create');
	Route::get('barang/show/{id}', 'BarangController@show');
	Route::get('barang/destroy/{id}', 'BarangController@destroy');
	Route::get('barang/edit/{id}', 'BarangController@edit');
	Route::get('barang/export', 'BarangController@export');
	Route::get('barang/import', 'BarangController@import');
	Route::get('barang/template', 'BarangController@template');
	Route::post('barang/store', 'BarangController@store');
	Route::post('barang/update/{id}', 'BarangController@update');
	Route::post('barang/upload', 'BarangController@upload');

	Route::get('daftarpajak', 'DaftarPajakController@index');
	Route::get('daftarpajak/create', 'DaftarPajakController@create');
	Route::post('daftarpajak/store', 'DaftarPajakController@store');

	Route::get('batch', 'BatchController@index');
	Route::get('batch/create', 'BatchController@create');
	Route::get('batch/destroy/{id}', 'BatchController@destroy');
	Route::get('batch/edit', 'BatchController@edit');
	Route::get('batch/edit/{id}', 'BatchController@edit');
	Route::get('batch/show/{id}', 'BatchController@show');
	Route::post('batch/store', 'BatchController@store');
	Route::post('batch/update/{id}', 'BatchController@update');

	Route::get('customer', 'CustomerController@index');
	Route::get('customer/create', 'CustomerController@create');
	Route::get('customer/destroy/{kode_customer}', 'CustomerController@destroy');
	Route::get('customer/edit', 'CustomerController@edit');
	Route::get('customer/edit/{id}', 'CustomerController@edit');
	Route::get('customer/show/{id}', 'CustomerController@show');
	Route::post('customer/store', 'CustomerController@store');
	Route::post('customer/update/{id}', 'CustomerController@update');

	Route::get('supplier', 'SupplierController@index');
	Route::get('supplier/create', 'SupplierController@create');
	Route::get('supplier/destroy/{id}', 'SupplierController@destroy');
	Route::get('supplier/edit', 'SupplierController@edit');
	Route::get('supplier/edit/{id}', 'SupplierController@edit');
	Route::get('supplier/show/{id}', 'SupplierController@show');
	Route::post('supplier/store', 'SupplierController@store');
	Route::post('supplier/update/{id}', 'SupplierController@update');

	Route::get('saldo', 'SaldoController@index');
	Route::get('saldo/create', 'SaldoController@create');
	Route::get('saldo/destroy/{id}', 'SaldoController@destroy');
	Route::get('saldo/edit/{id}', 'SaldoController@edit');
	Route::get('saldo/show/{id}', 'SaldoController@show');
	Route::post('saldo/store', 'SaldoController@store');
	Route::post('saldo/update/{id}', 'SaldoController@update');

	Route::get('DO', 'DoController@index');
	Route::get('DO/create', 'DoController@create');
	Route::get('DO/destroy/{id}', 'DoController@destroy');
	Route::get('DO/edit', 'DoController@edit');
	Route::get('DO/edit/{id}', 'DoController@edit');
	Route::get('DO/show/{id}', 'DoController@show');
	Route::post('DO/store', 'DoController@store');
	Route::post('DO/update/{id}', 'DoController@update');

	Route::get('IA', 'IaController@index');
	Route::get('IA/create', 'IaController@create');
	Route::get('IA/destroy/{id}', 'IaController@destroy');
	Route::get('IA/edit', 'IaController@edit');
	Route::get('IA/edit/{id}', 'IaController@edit');
	Route::get('IA/show/{id}', 'IaController@show');
	Route::post('IA/store', 'IaController@store');
	Route::post('IA/update/{id}', 'IaController@update');

	Route::get('pembelian/pr', 'PurchaseRequisitionController@index');
	Route::get('pembelian/pr/create', 'PurchaseRequisitionController@create');
	Route::get('pembelian/pr/destroy/{id}', 'PurchaseRequisitionController@destroy');
	Route::get('pembelian/pr/edit', 'PurchaseRequisitionController@edit');
	Route::get('pembelian/pr/edit/{id}', 'PurchaseRequisitionController@edit');
	Route::get('pembelian/pr/show/{id}', 'PurchaseRequisitionController@show');
	Route::post('pembelian/pr/store', 'PurchaseRequisitionController@store');
	Route::post('pembelian/pr/update/{id}', 'PurchaseRequisitionController@update');

	Route::get('pembelian/pi', 'PurchaseInvoiceController@index');
	Route::get('pembelian/pi/create', 'PurchaseInvoiceController@create');
	Route::get('pembelian/pi/destroy/{id}', 'PurchaseInvoiceController@destroy');
	Route::get('pembelian/pi/edit', 'PurchaseInvoiceController@edit');
	Route::get('pembelian/pi/edit/{id}', 'PurchaseInvoiceController@edit');
	Route::get('pembelian/pi/show/{id}', 'PurchaseInvoiceController@show');
	Route::post('pembelian/pi/store', 'PurchaseInvoiceController@store');
	Route::post('pembelian/pi/update/{id}', 'PurchaseInvoiceController@update');

	Route::get('pembelian/po', 'PurchaseOrderController@index');
	Route::get('pembelian/po/create', 'PurchaseOrderController@create');
	Route::get('pembelian/po/destroy/{id}', 'PurchaseOrderController@destroy');
	Route::get('pembelian/po/edit', 'PurchaseOrderController@edit');
	Route::get('pembelian/po/edit/{id}', 'PurchaseOrderController@edit');
	Route::get('pembelian/po/prjson/{id}', 'PurchaseOrderController@prjson');
	Route::get('pembelian/po/alamatjson/{id}', 'PurchaseOrderController@alamatjson');
	Route::get('pembelian/po/show/{id}', 'PurchaseOrderController@show');
	Route::post('pembelian/po/store', 'PurchaseOrderController@store');
	Route::post('pembelian/po/update/{id}', 'PurchaseOrderController@update');
	
	Route::get('pembelian/pt', 'PurchaseReturnController@index');
	Route::get('pembelian/pt/create', 'PurchaseReturnController@create');
	Route::get('pembelian/pt/destroy/{id}', 'PurchaseReturnController@destroy');
	Route::get('pembelian/pt/edit', 'PurchaseReturnController@edit');
	Route::get('pembelian/pt/edit/{id}', 'PurchaseReturnController@edit');
	Route::get('pembelian/pt/prjson/{id}', 'PurchaseReturnController@prjson');
	Route::get('pembelian/pt/alamatjson/{id}', 'PurchaseReturnController@alamatjson');
	Route::get('pembelian/pt/show/{id}', 'PurchaseReturnController@show');
	Route::post('pembelian/pt/store', 'PurchaseReturnController@store');
	Route::post('pembelian/pt/update/{id}', 'PurchaseReturnController@update');

	Route::get('pembelian/ro', 'ReceiveOrderController@index');
	Route::get('pembelian/ro/create', 'ReceiveOrderController@create');
	Route::get('pembelian/ro/destroy/{id}', 'ReceiveOrderController@destroy');
	Route::get('pembelian/ro/edit', 'ReceiveOrderController@edit');
	Route::get('pembelian/ro/edit/{id}', 'ReceiveOrderController@edit');
	Route::get('pembelian/ro/pojson/{id}', 'ReceiveOrderController@prjson');
	Route::get('pembelian/ro/alamatjson/{id}', 'ReceiveOrderController@alamatjson');
	Route::get('pembelian/ro/show/{id}', 'ReceiveOrderController@show');
	Route::post('pembelian/ro/store', 'ReceiveOrderController@store');
	Route::post('pembelian/ro/update/{id}', 'ReceiveOrderController@update');

	Route::get('user', 'UserController@user');
	Route::post('user/tambah', 'UserController@createUser');
	Route::post('user/edit', 'UserController@editUser');
	Route::get('user/permission', 'UserController@permission');
	Route::post('user/permission/edit', 'UserController@editPermission');
	Route::get('user/role', 'UserController@role');
	Route::post('user/role/tambah', 'UserController@createRole');
	Route::post('user/role/edit', 'UserController@editRole');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	// 'password' => 'Auth\PasswordController',
]);