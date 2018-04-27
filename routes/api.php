<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::resource('Archivos','Archivo\ArchivoController',['only'=> ['index', 'show', 'create', 'update', 'destroy']]);
Route::resource('Permisos','Permiso\PermisoController',['only'=> ['index', 'show', 'create', 'update', 'destroy']]);
Route::resource('Restricciones','Restriccion\RestriccionController',['only'=> ['index', 'show', 'create', 'update', 'destroy']]);
Route::resource('roles','Rol\RolController',['only'=> ['index', 'show','store', 'create', 'update', 'destroy']]);
Route::resource('Sesiones','Sesion\SesionController',['only'=> ['index', 'show', 'create', 'update', 'destroy']]);
Route::resource('usuarios','Usuario\UsuarioController',['only'=> ['index', 'show','store', 'create', 'update', 'destroy']]);

