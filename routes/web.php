<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect()->route('categoria.index');

});
Route::get('categoria','index@index')->name('categoria.index');
Route::get('login','registro@viewlogin')->name('login');
Route::get('registro', 'registro@viewregistro')->name('registro');
Route::post('registrar', 'registro@store')->name('registrar');
Route::post('iniciar', 'logincontroller@login')->name('iniciar');
Route::get('home', 'inicio@index')->name('home');
Route::get('/logout', 'logincontroller@logout')->name('logout');



Route::get('/usuarios','usersCon@show')->name('list_us');
Route::get('/users', 'usersCon@showI')->name('añadir_us');

Route::get('/empleados', 'empleCon@show')->name('list_em');

Route::get('/sensor', 'sensorcontro@show')->name('list_senores');


Route::get('/ciudad', 'UserController@show')->name('list_ciudad');

Route::get('/vehiculos', 'vehiculosCont@show')->name('list_vehic');

Route::get('/vias', 'viasCont@show')->name('list_vias');

Route::get('/tablasTdma', 'tabasTDMA@show')->name('list_TDMA');

Route::get('/tablasreg', 'tablasRege@show')->name('list_Rege');

Route::get('/tablastdp', 'tablasTpd@show')->name('list_Tpd');


// Route::group(['prefix' => 'admin'], function () {
//     Route::get('table-list', function () {
// 		return view('pages.table_list');
// 	})->name('table');

// 	Route::get('typography', function () {
// 		return view('pages.typography');
// 	})->name('typography');

// 	Route::get('icons', function () {
// 		return view('pages.icons');
// 	})->name('icons');

// 	Route::get('map', function () {
// 		return view('pages.map');
// 	})->name('map');

// 	Route::get('notifications', function () {
// 		return view('pages.notifications');
// 	})->name('notifications');

// 	Route::get('rtl-support', function () {
// 		return view('pages.language');
// 	})->name('language');

// 	Route::get('upgrade', function () {
// 		return view('pages.upgrade');
// 	})->name('upgrade');
// });
