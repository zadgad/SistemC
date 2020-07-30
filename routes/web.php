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

Route::get('zadga', function(){
	$dep=DB::select('SELECT  nomb,  COUNT(*)
                    FROM departamento d,  ciudad c
                    where d.id_dep=c.depa
                    group by  d.nomb ');
    return view('categoria.proto',compact('dep'));
} );
Route::get('categoria','index@index')->name('categoria.index');
Route::get('login','registro@viewlogin')->name('login');
Route::get('registro', 'registro@viewregistro')->name('registro');
Route::post('registrar', 'registro@store')->name('registrar');
Route::post('iniciar', 'logincontroller@login')->name('iniciar');
Route::get('/superu/{id}', 'index@user')->name('inicio');
Route::get('/suario/{id}','index@usuario')->name('inius');
Route::get('home/{$id}', 'inicio@index')->name('home');
Route::get('/logout', 'logincontroller@logout')->name('logout');
Route::get('/informacion/user{id}','UsrController@info')->name('infoRut');

Route::get('/ususer/{id}','User@index')->name('iniUs');
Route::get('/empleados/{id}','Empleados@index')->name('inicioEm');

Route::get('/RegistroUs/{id}','UsrController@reDisct')->name('register');
Route::get('/formularioAd','UsrController@form')->name('formulario');
Route::get('/listaUserWold','UsrController@listU')->name('listUs');
Route::get('/listaUserEmp','UsrController@listE')->name('list_em');
Route::get('/listaUserAdm','UsrController@listA')->name('list_ad');
Route::get('/listaUserUs','UsrController@listUs')->name('list');
Route::get('/usuarios','UsrController@index')->name('list_us');
Route::post('/usersI', 'UsrController@insertar')->name('insertar');
Route::post('/usersIsert/{id}', 'UsrController@insertar2')->name('insertar2');
Route::get('userUser/{id}','UsrController@editarUs')->name('editaruser');
Route::put('editUs/{id}','UsrController@editUs')->name('editarUs');
Route::put('editar/user/{id}','UsrController@editarU')->name('edit');
Route::put('edit/user/{id}','UsrController@editarPas')->name('editP');

Route::get('/ciudad','CiudadController@index')->name('iniciu');
Route::post('/insertciud','CiudadController@insertar')->name('insertciu');
Route::get('/listCiud/ciudad','CiudadController@listCiu')->name('listCiu');
Route::post('insertarCiudad/Nueva_ciudad','CiudadController@añadir')->name('añadriC');
Route::get('insertarCiudad/editar_ciudad','CiudadController@listDep')->name('ListD');
/* Route::get('/sensor','SensorController@index')->name('inisen');
 */

/*
Route::get('/vias','index')->name('inicioV');
Route::post('/insertvia','ViaController@insertar')->name('insertvia');
Route::post('/insertvia','ViaController@listvia')->name('list_vias'); */
Route::get('/vias', 'ViaController@show')->name('list_vias');
Route::get('/Avias','ViaController@añadirVia')->name('añadir_via');
Route::post('/dinamicVia','ViaController@fetvh')->name('dynamicdependent.fetch');
Route::post('/insertV','ViaController@insertVia')->name('viainsert');
Route::get('/editar_via/{id}','ViaController@editV')->name('editVia');
Route::put('/edit_via/{id}','ViaController@editarVia')->name('viaedit');

/* Route::get('/vehiculos','VehiculoController@index')->name('inicioveh');
Route::get('/insertVehi','VehiculoController@iinsertar')->name('insertarvehi'); */

Route::get('/añadirV','VehiculoController@añadir')->name('añadir_vehi');
Route::get('/vehiculos', 'VehiculoController@show')->name('list_vehic');
Route::post('/vehiculo_insert','VehiculoController@insert')->name('vehinsert');
Route::get('/vehiculo_editar/{id}','VehiculoController@editv')->name('editVehiculo');
Route::put('insert_vehiculos/{id}','VehiculoController@datosinsert')->name('datesinsert');

Route::get('/sensor', 'SensorController@show')->name('list_senores');
Route::get('/añadir_sensor','SensorController@añadirS')->name('añadirS');
Route::post('/inserts','SensorController@inserts')->name('insertS');
Route::get('/editarsen_sen/{id}','SensorController@editar')->name('editarSen');
Route::put('/editar_datosSen/{id}','SensorController@editinser')->name('editarD');

Route::get('/list_ubication','UbicacionController@index')->name('listUbication');
Route::get('/add_dates','UbicacionController@show')->name('añadirubica');
Route::post('/inserte_infor','UbicacionController@create')->name('insertDates');
Route::get('/edit_ubication/{id}','UbicacionController@edit')->name('editUbication');
Route::put('/insert_edit/{id}','UbicacionController@store')->name('insertEdit');

Route::get('/simulador/formulario','Simulador@formulario')->name('formularioSim');
Route::post('/simulador/insertDate/{id}','Simulador@insert')->name('llenarDatos');
Route::get('/simulador/tablegister','Simulador@showFor')->name('registerSimulador');
Route::get('/simulador/graficDate','Simulador@graficD')->name('graficosReg');
Route::get('/simulador/graficDate','Simulador@tablasim')->name('tablasim');

Route::get('/register/formulario','EstadistiController@formulario')->name('formEsta');
Route::post('/register/insertDate','EstadistiController@insertDate')->name('dateinsert');
Route::get('/register/tablegister','EstadistiController@getTable')->name('registerD');
Route::get('/register/listgister','EstadistiController@getlist')->name('registo_ubic');
Route::get('/register/Aforo', 'EstadistiController@aforo')->name('aforo');
Route::get('/register/graficDate','EstadistiController@graficDate')->name('graficD');
Route::get('/loading/carga','index@loading')->name('loading');
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
