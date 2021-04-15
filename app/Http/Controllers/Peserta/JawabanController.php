<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\FormatJawaban;
use App\Models\Soal;
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
		$user = Auth::user();
		$soal = Soal::where('angkatan', $user->angkatan)->firstOrFail();
		$jawaban = Jawaban::where('id_user', $user->id)->first();
		$timeNow = strtotime(now());
		$endTimeSoal = strtotime($soal->end_time);
		$canUpload = true;

		if ($timeNow > $endTimeSoal) {
			$canUpload = false;
		}
		return view('peserta.app.jawaban.index', compact('soal', 'jawaban', 'canUpload'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$user = Auth::user();
		$soal = Soal::where('angkatan', $user->angkatan)->firstOrFail();
		$timeNow = strtotime(now());
		$endTimeSoal = strtotime($soal->end_time);
		$isExists = Jawaban::where('id_user', $user->id)->exists();
		if ($timeNow > $endTimeSoal) {
			alert()
				->error('Waktu pengumpulan telah melewati batas.', 'Gagal')
				->persistent('Tutup')
				->autoclose(5000);
			return redirect()->route('jawaban.index');
		}

		if ($isExists) {
			return redirect()->route('jawaban.edit');
		}

		return view('peserta.app.jawaban.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$user = Auth::user();
		$soal = Soal::where('angkatan', $user->angkatan)->firstOrFail();
		$timeNow = strtotime(now());
		$endTimeSoal = strtotime($soal->end_time);
		$isExists = Jawaban::where('id_user', $user->id)->exists();
		if ($timeNow > $endTimeSoal) {
			alert()
				->error('Waktu pengumpulan telah melewati batas.', 'Gagal')
				->persistent('Tutup')
				->autoclose(5000);
			return redirect()->route('jawaban.index');
		}

		if ($isExists) {
			return redirect()->route('jawaban.edit');
		}

		$request->validate([
			'jawaban' => ['required', 'file', 'mimes:zip', new FormatJawaban, 'max:100000']
		]);

		$file_name = Str::random(20) . '.zip';

		$user->Jawaban()->create([
			'nama_file' => $file_name
		]);
		Storage::putFileAs('public/jawaban', $request->file('jawaban'), $file_name);

		alert()
			->success('Jawaban berhasil diupload.', 'Sukses!')
			->persistent('Tutup');
		return redirect()->route('jawaban.index');
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
	public function edit()
	{
		$user = Auth::user();
		$soal = Soal::where('angkatan', $user->angkatan)->firstOrFail();
		$data = Jawaban::where('id_user', $user->id)->firstOrFail();
		$timeNow = strtotime(now());
		$endTimeSoal = strtotime($soal->end_time);
		if ($timeNow > $endTimeSoal) {
			alert()
				->error('Waktu pengumpulan telah melewati batas.', 'Gagal')
				->persistent('Tutup')
				->autoclose(5000);
			return redirect()->route('jawaban.index');
		}

		return view('peserta.app.jawaban.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$user = Auth::user();
		$soal = Soal::where('angkatan', $user->angkatan)->firstOrFail();
		$jawaban = Jawaban::where('id_user', $user->id)->firstOrFail();
		$timeNow = strtotime(now());
		$endTimeSoal = strtotime($soal->end_time);
		if ($timeNow > $endTimeSoal) {
			alert()
				->error('Waktu pengumpulan telah melewati batas.', 'Gagal')
				->persistent('Tutup')
				->autoclose(5000);
			return redirect()->route('jawaban.index');
		}

		$request->validate([
			'jawaban' => ['required', 'file', 'mimes:zip', new FormatJawaban, 'max:100000']
		]);

		$og_file_name = $jawaban->nama_file;
		$file_name = Str::random(20) . '.zip';

		$jawaban->update([
			'nama_file' => $file_name
		]);
		Storage::putFileAs('public/jawaban', $request->file('jawaban'), $file_name);
		Storage::disk('jawaban')->delete($og_file_name);

		alert()
			->success('Jawaban berhasil diubah.', 'Sukses!')
			->persistent('Tutup');
		return redirect()->route('jawaban.index');
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

	/**
	 * Get the related file from local storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function download()
	{
		$user = Auth::user();
		$jawaban = Jawaban::where('id_user', $user->id)->firstOrFail();
		return Storage::disk('jawaban')->download($jawaban->nama_file, 'Kelompok ' . $user->nomor . ' - BOJ 2021.zip');
	}
}
