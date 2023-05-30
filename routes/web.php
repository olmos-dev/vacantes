<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes(['verify'=>true]);

//Route::get('/home', 'HomeController@index')->name('home');

/**VACANTES*/
Route::get('vacantes','VacanteController@index')->name('vacantes.index')->middleware(['auth','verified']);
Route::get('vacantes/nueva-vacante','VacanteController@create')->name('vacantes.create')->middleware(['auth','verified']);
Route::get('vacantes/{vacante}/editar-vacante','VacanteController@edit')->name('vacantes.edit')->middleware('auth');
Route::put('vacantes/{vacante}','VacanteController@update')->name('vacantes.update')->middleware('auth');
Route::post('vacantes','VacanteController@store')->name('vacantes.store')->middleware('auth');
Route::get('vacantes/{vacante}','VacanteController@show')->name('vacantes.show');
Route::delete('vacantes/{vacante}','VacanteController@destroy')->name('vacantes.destroy');
/**Cambiar el estado de la vacante: activa - inactiva */
Route::patch('vacantes/estado/{id}','VacanteController@estado')->name('vacantes.estado');
/**subir imagen vacante */
Route::post('/vacantes/subir-imagen','VacanteController@subirImagen')->name('vacantes.imagen')->middleware('auth');
/**borrar imagen vacante */
Route::post('/vacantes/borrar-imagen','VacanteController@borrarImagen')->name('vacantes.borrar')->middleware('auth');

/**Inicio*/
Route::get('/','InicioController')->name('inicio.index');

/**Categorias*/
Route::get('categorias/{categoria}','CategoriaController')->name('categoria.index');


/**Candidatos*/
Route::get('canditatos/{id}','CandidatoController@index')->name('candidato.index');
Route::post('candidatos','CandidatoController@store')->name('candidato.store');


/**Notificaciones*/
Route::get('notificaciones','NotificacionesController')->name('notificaciones')->middleware('auth');

/**Buscar*/
Route::get('busqueda','VacanteController@resultados')->name('busqueda.resultados');
Route::post('busqueda','VacanteController@buscar')->name('busqueda.buscar');