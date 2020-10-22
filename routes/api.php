<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//TABLA PERSONAS
route::get("/personas/{id?}","API\PersonaController@index")->where("id", "[0-9]+");
route::post("/personas","API\PersonaController@guardar");
route::delete("/personas/{id?}","API\PersonaController@destroy");
route::put("/personas/{id?}","API\PersonaController@update");
//TABLA COMENTARIOS
route::get("/comentarios/{id?}","API\ComentarioController@index")->where("id", "[0-9]+");
route::post("/comentarios","API\ComentarioController@guardar");
route::delete("/comentarios/{id?}","API\ComentarioController@destroy");
route::put("/comentarios/{id?}","API\ComentarioController@update");
//TABLA PRODUCTOS
route::get("/productos/{id?}","API\ProductoController@index")->where("id", "[0-9]+");
route::post("/productos","API\ProductoController@guardar");
route::delete("/productos/{id?}","API\ProductoController@destroy");
//route::put("/productos/{id?}","API\ProductoController@update");