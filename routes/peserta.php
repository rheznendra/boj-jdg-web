<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Peserta')->group(function () {

	Route::namespace('Auth')->middleware('guest')->name('auth.')->group(function () {
		Route::get('login', 'AuthController@index')->name('login');
		Route::patch('login', 'AuthController@update');
	});

	Route::middleware('auth')->group(function () {
		Route::get('logout', 'AuthController@destroy')->name('destroy');
		Route::get('/', 'HomeController@index')->name('home');
	});
});
