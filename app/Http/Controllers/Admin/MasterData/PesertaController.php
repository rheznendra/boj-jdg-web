<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Rules\MeetCode;
use App\Rules\HumanName;
use App\Models\User;
use App\Http\Controllers\Controller;

class PesertaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = User::get();
		return view('admin.app.master-data.peserta.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.app.master-data.peserta.create');
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
			'angkatan'         => 'required|in:2019,2020',
			'kode_google_meet' => ['required', new MeetCode, 'unique:users'],
			'nim_anggota.*'    => 'required|numeric|digits:11|distinct|unique:anggotas,nim',
			'nama_anggota.*'   => ['required', new HumanName]
		], [], [
			'nim_anggota.*' => 'NIM anggota',
			'nama_anggota.*' => 'nama anggota'
		]);

		$users = User::count();
		if (!$users) {
			$nomor = 1;
		} else {
			$nomor = User::latest()->first()->nomor + 1;
		}

		$username = Str::upper(Str::random(8));
		$password = Str::random(8);

		$arr = $request->only('angkatan', 'kode_google_meet');
		$arr = Arr::add($arr, 'nomor', $nomor);
		$arr = Arr::add($arr, 'username', $username);
		$arr = Arr::add($arr, 'password', bcrypt($password));

		$user = User::create($arr);

		$anggota = [];
		foreach ($request->nim_anggota as $index => $item) {
			$anggota[$index]['nim'] = $item;
			$anggota[$index]['nama'] = $request->nama_anggota[$index];
		}
		$user->Anggota()->createMany($anggota);

		$result = "=========================\nKelompok $nomor\nUsername\t: $username\nPassword\t: $password\n=========================\nLink Login\t: http://bit.ly/login-boj";

		alert()
			->success('Data successfully created.', 'Success!')
			->persistent('Close')
			->autoclose(3000);

		return redirect()->route('admin.master-data.peserta.create')->with('result', $result);
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
	public function edit(User $data)
	{
		return view('admin.app.master-data.peserta.edit', compact('data'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $data)
	{
		if ($request->method() == 'PATCH') {
			$rules = [
				'kode_google_meet' => ['required', new MeetCode, Rule::unique('users')->ignore($data->id)]
			];
			$rulesName = [];
			foreach ($data->Anggota()->get() as $index => $item) {
				$rules['nim_anggota.' . $index]    = [
					'required', 'numeric', 'digits:11', 'distinct',
					Rule::unique('anggotas', 'nim')->ignore($item->id)
				];
				$rules['nama_anggota.' . $index] = ['required', new HumanName];
				$rulesName['nim_anggota.' . $index] = 'NIM anggota';
				$rulesName['nama_anggota.' . $index] = 'nama anggota';
			}
			$request->validate($rules, [], $rulesName);

			$arr = $request->only('kode_google_meet');

			$data->update($arr);

			foreach ($data->Anggota()->get() as $index => $item) {
				$item->update([
					'nim' => $request->nim_anggota[$index],
					'nama' => $request->nama_anggota[$index]
				]);
			}
		} else {

			$request->validate([
				'password' => 'required|confirmed|min:8'
			]);

			$password = bcrypt($request->password);
			$data->update([
				'password' => $password
			]);
		}

		alert()
			->success('Data successfully updated.', 'Success!')
			->persistent('Close')
			->autoclose(3000);

		return redirect()->route('admin.master-data.peserta.edit', $data->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $data)
	{
		$data->delete();
		alert()
			->success('Data successfully deleted.', 'Success!')
			->persistent('Close')
			->autoclose(3000);

		return redirect()->route('admin.master-data.peserta.index');
	}
}
