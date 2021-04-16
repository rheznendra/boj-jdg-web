<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Rule;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user = auth()->user();
		$timeSoal = null;
		$timeNow = null;

		$soal = Soal::where('angkatan', $user->angkatan)->first();
		if ($soal) {
			$timeSoal = strtotime($soal->start_time);
			$timeNow = strtotime(now());
		}
		return view('peserta.app.home', compact('timeSoal', 'timeNow'));
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
	public function store()
	{
		$user = Auth::user();
		$soal = Soal::where('angkatan', $user->angkatan)->firstOrFail();
		$ext = explode('.', $soal->nama_file)[1];

		return Storage::disk('soal')->download($soal->nama_file, 'BOJ - Soal Angkatan ' . $user->angkatan . '.' . $ext);
	}

	/**
	 * Display the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show()
	{
		$data = Rule::orderByRaw('FIELD(kategori, "ketentuan", "peraturan")')->get();
		return view('peserta.app.ketentuan-peraturan', compact('data'));
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
	public function destroy($id)
	{
		//
	}
}
