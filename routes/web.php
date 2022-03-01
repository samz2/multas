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
    return view('auth.login');
})->middleware('checkAuth');;
// Route::get('/', function () {
//     return view('welcome');
// })->middleware('checkAuth');;
Route::get('/uniforme', function () {
    return view('vistas.uniforme');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/autenticacion', 'userController@index');
Route::get('/getUsers', 'userController@show');
Route::get('/changeStatusUsers/{id}/{user}', 'userController@update');
Route::get('/reset/{user}', 'userController@reset');
Route::get('/create/{user}', 'userController@create');

Route::get('/consultaRENIEC/{dni}', 'personaController@show');
Route::post('/addPersona', 'personaController@store');
Route::get('/getPersonas', 'personaController@index');

Route::post('/addMulta', 'MultasController@store');
Route::get('/getMultas', 'MultasController@index');
Route::get('/getMultasLista', 'MultasController@show');
Route::get('/getMultasImpagas/{fechai}/{fechaf}', 'MultasController@multas');
Route::get('/reporte/{fechai}/{fechaf}', 'MultasController@reporte');
Route::get('/getResponse', 'MultasController@create');

Route::post('/addRegistro', 'RegistroMultasController@store');
//rutas administrador

Route::get('{path}', 'HomeController@index');