<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Peserta')->group(function () {

	Route::namespace('Auth')->middleware('guest')->name('auth.')->group(function () {
		Route::get('login', 'AuthController@index')->name('login');
		Route::patch('login', 'AuthController@update');
	});

	Route::middleware('auth')->group(function () {
		Route::get('logout', 'Auth\AuthController@destroy')->name('logout');
		Route::get('/', 'HomeController@index')->name('home');
		Route::get('soal/download', 'HomeController@store')->name('download');
		Route::get('ketentuan & peraturan', 'HomeController@show')->name('ketentuan-peraturan');

		Route::prefix('jawaban')->name('jawaban.')->group(function () {
			Route::get('/', 'JawabanController@index')->name('index');
			Route::get('upload', 'JawabanController@create')->name('create');
			Route::post('upload', 'JawabanController@store')->name('store');
			Route::get('edit', 'JawabanController@edit')->name('edit');
			Route::patch('edit', 'JawabanController@update')->name('update');
			Route::get('download', 'JawabanController@download')->name('download');
		});
	});
});
