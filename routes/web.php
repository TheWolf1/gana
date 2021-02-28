<?php

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

Route::get('/', 'admin\HomeController@index')->middleware('auth');



Route::group(['prefix'=>'admin','namespace'=>'admin', 'middleware'=>'auth'],function(){
    Route::get('/','homeController@index')->name('home');
    Route::Post('/CrearUsuario','homeController@create')->name('Crear_Usuario');
    Route::Post('/ActualizarUsuario','homeController@update')->name('actualizar_Usuario');
    Route::get('/EliminarUsuario/{idU}/{idC}/{per}','homeController@destroy')->name('eliminar_Usuario');


    Route::get('/Usuario','usuarioController@index')->name('Usuario');
    Route::get('/Usuario/eliminar/{id}','usuarioController@destroy')->name('Usuario_eliminar');
    Route::post('/Usuario/crear','usuarioController@create')->name('Crear_usuario');
    Route::post('/Usuario/cargar_dinero','usuarioController@cargarDinero')->name('cargar_dinero');
    Route::post('/Usuario/actualizar','usuarioController@update')->name('actualizar_usuario');

    Route::get('/servicio','servicioController@index')->name('servicio');
    Route::get('/servicio/eliminar/{id}','servicioController@destroy')->name('eliminar_servicio');
    Route::post('/servicio/crear','servicioController@create')->name('crear_servicio');
    Route::post('/servicio/actualizar','servicioController@update')->name('actualizar_servicio');


    Route::get('/Pxp','pxpController@index')->name('Pxp');
    Route::get('/Pxp/eliminar/{id}','pxpController@destroy')->name('eliminar_Pxp');
    Route::post('/Pxp/crear','pxpController@create')->name('crear_Pxp');
    Route::post('/Pxp/actualizar','pxpController@update')->name('actualizar_Pxp');


    Route::get('/Correo','correoController@index')->name('Correo');
    Route::get('/Correo/eliminar/{id}','correoController@destroy')->name('eliminar_Correo');
    Route::post('/Correo/crear','correoController@create')->name('crear_correo');
    Route::post('/Correo/actualizar','correoController@update')->name('actualizar_correo');
    

});

Auth::routes();

Route::get('/home', 'admin\HomeController@index')->name('home')->middleware('auth');
