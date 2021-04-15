<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Jawaban;
use App\Http\Controllers\Controller;

class JawabanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = Jawaban::get();
		return view('admin.app.jawaban', compact('data'));
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
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Jawaban $data)
	{
		$data->delete();
		Storage::disk('jawaban')->delete($data->nama_file);

		alert()
			->success('Data successfully deleted.', 'Success!')
			->persistent('Close');

		return redirect()->route('admin.jawaban-peserta.index');
	}

	/**
	 * Get the related file from local storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function download(Jawaban $data)
	{
		return Storage::disk('jawaban')->download($data->nama_file, 'Kelompok ' . $data->Kelompok->nomor . ' - BOJ 2021.zip');
	}
}
