<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('admin.app.auth.settings');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$user = Auth::guard('admin')->user();
		$request->validate([
			'username' => ['sometimes', 'required', 'string', 'min:5', 'max:10', Rule::unique('admins', 'username')->ignore($user->id)],
			'password' => 'sometimes|required|password',
			'new_password' => 'required_with:password|string|min:8|confirmed'
		]);
		if ($request->method() == 'PATCH') {
			$user->update(['username' => $request->username]);
		} else if ($request->method() == 'PUT') {
			$user->update(['password' => bcrypt($request->password)]);
		}
		alert()
			->success('Data successfully updated.', 'Success!')
			->persistent('Close');
		return redirect()->route('admin.settings.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
