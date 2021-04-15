<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

	Route::namespace('Auth')->middleware('guest:admin')->group(function () {
		Route::get('login', 'AuthController@index')->name('login');
		Route::patch('login', 'AuthController@update');
	});

	Route::middleware('auth:admin')->group(function () {
		Route::get('/', 'HomeController@index')->name('home');
		Route::namespace('Auth')->group(function () {
			Route::get('logout', 'AuthController@destroy')->name('logout');
			Route::prefix('settings')->name('settings.')->group(function () {
				Route::get('/', 'SettingsController@index')->name('index');
				Route::match(['patch', 'put'], '/', 'SettingsController@update');
			});
		});
		Route::namespace('MasterData')->prefix('master-data')->name('master-data.')->group(function () {

			Route::middleware('role:master|sie-perkap')->prefix('peserta')->name('peserta.')->group(function () {
				Route::get('/', 'PesertaController@index')->name('index');
				Route::get('create', 'PesertaController@create')->name('create');
				Route::post('create', 'PesertaController@store');
				Route::get('{data:id}/edit', 'PesertaController@edit')->name('edit');
				Route::match(['patch', 'put'], '{data:id}/edit', 'PesertaController@update');
				Route::delete('{data:id}/destroy', 'PesertaController@destroy')->name('destroy');
			});

			Route::middleware('role:master|sie-lomba')->group(function () {

				Route::prefix('ketentuan-peraturan')->name('ketentuan-peraturan.')->group(function () {
					Route::get('/', 'KetentuanPeraturanController@index')->name('index');
					Route::get('edit', 'KetentuanPeraturanController@edit')->name('edit');
					Route::patch('edit', 'KetentuanPeraturanController@update');
				});

				Route::prefix('soal')->name('soal.')->group(function () {
					Route::get('/', 'SoalController@index')->name('index');
					Route::get('create', 'SoalController@create')->name('create');
					Route::post('create', 'SoalController@store');
					Route::get('{data:id}/edit', 'SoalController@edit')->name('edit');
					Route::patch('{data:id}/edit', 'SoalController@update');
					Route::delete('{data:id}/destroy', 'SoalController@destroy')->name('destroy');
					Route::post('{data:id}/download', 'SoalController@download')->name('download');
				});
			});
		});

		Route::middleware('role:master|sie-lomba')->prefix('jawaban-peserta')->name('jawaban-peserta.')->group(function () {
			Route::get('/', 'JawabanController@index')->name('index');
			Route::post('{data:id}/download', 'JawabanController@download')->name('download');
			Route::delete('{data:id}/destroy', 'JawabanController@destroy')->name('destroy');
		});
	});
});
