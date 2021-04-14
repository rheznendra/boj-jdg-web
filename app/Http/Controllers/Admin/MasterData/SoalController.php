<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Soal;
use App\Http\Controllers\Controller;

class SoalController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = Soal::orderBy('angkatan', 'asc')->get();
		return view('admin.app.master-data.soal.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.app.master-data.soal.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'angkatan' => 'required|in:2019,2020',
			'file' => 'required|file|max:5120|mimes:pdf,zip,docx,doc',
			'start_time' => 'required|date_format:Y-m-d H:i',
			'end_time' => 'required|date_format:Y-m-d H:i|after:start_time'
		]);

		if (Soal::where('angkatan', $request->angkatan)->exists()) {
			alert()
				->error('Data with selected angkatan already exists.', 'Error!')
				->persistent('Close');
			return redirect()->route('admin.master-data.soal.create')->withInput();
		}

		$nama_file = Str::random(20) . '.' . $request->file('file')->getClientOriginalExtension();
		$arr = $request->only('angkatan', 'start_time', 'end_time');
		$arr = Arr::add($arr, 'nama_file', $nama_file);

		Soal::create($arr);
		Storage::putFileAs('public/soal', $request->file('file'), $nama_file);

		alert()
			->success('Data successfully created.', 'Success!')
			->persistent('Close')
			->autoclose(3000);

		return redirect()->route('admin.master-data.soal.create');
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
	public function edit(Soal $data)
	{
		return view('admin.app.master-data.soal.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Soal $data)
	{
		$request->validate([
			'angkatan' => 'required|in:2019,2020',
			'file' => 'nullable|file|max:5120|mimes:pdf,zip,docx,doc',
			'start_time' => 'required|date_format:Y-m-d H:i',
			'end_time' => 'required|date_format:Y-m-d H:i|after:start_time'
		]);

		$arr = $request->only('angkatan', 'start_time', 'end_time');

		if ($request->hasFile('file')) {
			$original_file_name = $data->nama_file;
			$nama_file = Str::random(20) . '.' . $request->file('file')->getClientOriginalExtension();
			$arr = Arr::add($arr, 'nama_file', $nama_file);
		}

		$data->update($arr);

		if ($request->hasFile('file')) {
			Storage::disk('soal')->delete($original_file_name);
			Storage::putFileAs('public/soal', $request->file('file'), $nama_file);
		}

		alert()
			->success('Data successfully updated.', 'Success!')
			->persistent('Close')
			->autoclose(3000);

		return redirect()->route('admin.master-data.soal.edit', $data->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Soal $data)
	{
		$data->delete();
		Storage::disk('soal')->delete($data->nama_file);

		alert()
			->success('Data successfully deleted.', 'Success!')
			->persistent('Close')
			->autoclose(3000);

		return redirect()->route('admin.master-data.soal.index');
	}

	/**
	 * Get the related file from local storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function download(Soal $data)
	{
		$extension = explode('.', $data->nama_file)[1];
		return Storage::disk('soal')->download($data->nama_file, 'BOJ 2021 - Soal Angkatan-20.' . $extension);
	}
}
