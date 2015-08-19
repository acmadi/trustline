<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSyaratPembayaranRequest;

use App\Karyawan;
use App\syaratPembayaran;
use Illuminate\Http\Request;

class SyaratPembayaranController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = syaratPembayaran::get(
			['id',
			'nama']
		)->toArray();

		return view('syaratpembayaran.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('syaratpembayaran.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateSyaratPembayaranRequest $request)
	{
		$data = $request->all();

		if($data['syarat_diskon'] != 0 && $data['diskon']!=0)
		{
			$data['nama'] = $data['diskon'].'/'.$data['syarat_diskon'].' n/'.$data['jatuh_tempo'];
		}
		else
		{
			$data['nama'] = 'n/'.$data['jatuh_tempo'];
		}
//		dd($data);
		SyaratPembayaran::create($data);
		return redirect('syaratpembayaran');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = SyaratPembayaran::find($id)->toArray();
        return view('syaratpembayaran.show', compact('data'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $data = SyaratPembayaran::find($id)->toArray();
        return view('syaratpembayaran.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateSyaratPembayaranRequest $request, $id)
	{
        $terms = SyaratPembayaran::find($id);
        $data = $request->all();
        if($data['syarat_diskon'] != 0 && $data['diskon']!=0)
        {
            $terms['nama'] = $data['diskon'].'/'.$data['syarat_diskon'].' n/'.$data['jatuh_tempo'];
        }
        elseif($data['syarat_diskon'] == 0 && $data['diskon']==0 && $data['jatuh_tempo'] == 0)
        {
            $terms['nama'] = 'C.O.D';
        }
        else
        {
            $terms['nama'] = 'n/'.$data['jatuh_tempo'];
        }
        $terms['syarat_diskon'] = $data['syarat_diskon'];
        $terms['diskon'] = $data['diskon'];
        $terms['jatuh_tempo'] = $data['jatuh_tempo'];
//        dd($terms->toArray());
		SyaratPembayaran::find($id)->update($terms->toArray());
        return redirect('syaratpembayaran');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = SyaratPembayaran::find($id);
		$data->delete();
		return redirect('syaratpembayaran');
	}

}
