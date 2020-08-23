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

// lo comentamos por el momento
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// ahora si hacemos uso de un middleware para controlar el acceso a los recursos de la API
Route::group(['middleware' => 'auth:api'], function(){
    Route::apiResource('/precios', 'PrecioController');
    Route::apiResource('/empresas', 'EmpresaController');
    Route::apiResource('/alumnos', 'AlumnoController');
    Route::apiResource('/pagos', 'PagoController');
});