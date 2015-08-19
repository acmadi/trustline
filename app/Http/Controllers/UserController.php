<?php namespace App\Http\Controllers;

use App\User;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::get();
		return view('user.user', compact('users'));
	}

	public function permission() {
		$perms = Permission::get();
		return view('user.permission', compact('perms'));
	}

	public function editPermission(Request $request) {
		$req = $request->all();
		$perm = Permission::find($req['id']);
		$perm->display_name = $req['display_name'];
		$perm->description = $req['description'];
		$perm->save();

		return redirect()->back();
	}

	public function role() {
		$roles = Role::get();
		$perms = Permission::get();

		$data = compact('roles', 'perms');
		return view('user.role', $data);
	}

	public function createRole(Request $request) {
		$req = $request->all();
		$role = new Role;
		$role->name = $req['name'];
		$role->description = $req['description'];
		$role->save();

		return redirect()->back();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
