<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Models\Rule;
use App\Http\Controllers\Controller;

class KetentuanPeraturanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = Rule::orderByRaw('FIELD(kategori, "ketentuan", "peraturan")')->get();
		return view('admin.app.master-data.ketentuan-peraturan.index', compact('data'));
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
	 * @return \Illuminate\Http\Response
	 */
	public function edit()
	{
		$ketentuan = Rule::where('kategori', 'ketentuan')->first();
		$peraturan = Rule::where('kategori', 'peraturan')->first();
		return view('admin.app.master-data.ketentuan-peraturan.edit', compact('ketentuan', 'peraturan'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$request->validate([
			'ketentuan' => 'required|min:100',
			'peraturan' => 'required|min:100'
		]);
		$ketentuan = Rule::where('kategori', 'ketentuan')->first();
		$peraturan = Rule::where('kategori', 'peraturan')->first();

		if (!$ketentuan) {
			Rule::create([
				'text' => nl2br($request->ketentuan),
				'kategori' => 'ketentuan'
			]);
		} else {
			$ketentuan->update([
				'text' => nl2br($request->ketentuan)
			]);
		}

		if (!$peraturan) {
			Rule::create([
				'text' => nl2br($request->peraturan),
				'kategori' => 'peraturan'
			]);
		} else {
			$peraturan->update([
				'text' => nl2br($request->peraturan)
			]);
		}

		alert()
			->success('Data successfully updated.', 'Success!')
			->persistent('Close')
			->autoclose(3000);

		return redirect()->route('admin.master-data.ketentuan-peraturan.edit');
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
