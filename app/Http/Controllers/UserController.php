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
		$perms = Permission::orderBy('name')->get();
		return view('user.permission', compact('perms'));
	}

	public function editPermission(Request $request) {
		$perm = Permission::find($request->input('id'));
		$perm->display_name = $request->input('display_name');
		$perm->description = $request->input('description');
		$perm->save();

		return redirect()->back();
	}

	public function role() {
		$roles = Role::with('perms')->get();
		$perms = Permission::orderBy('name')->get();
		$roles_json = $roles->toArray();

		$data = compact('roles', 'perms', 'roles_json');
		// dd($data);
		return view('user.role', $data);
	}

	public function editRole(Request $request) {
		$role = Role::find($request->input('role'));
		$perms = $request->input('perms');

		$role->perms()->detach();
		$role->perms()->sync($perms);

		return redirect()->back();
	}

	public function createRole(Request $request) {
		$role = new Role;
		$role->name = $request->input('name');
		$role->description = $request->input('description');
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
