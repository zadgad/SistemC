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
