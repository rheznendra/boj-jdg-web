<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jawaban;
use App\Models\Anggota;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function index()
	{
		$kelompok = User::count();
		$peserta = Anggota::count();
		$jawaban = Jawaban::count();
		return view('admin.app.home', compact('kelompok', 'peserta', 'jawaban'));
	}
}
