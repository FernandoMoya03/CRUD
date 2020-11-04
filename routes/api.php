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
route::middleware("auth:sanctum")->get("/personas/{id?}","API\PersonaController@index")->where("id", "[0-9]+");
route::middleware('vacios','ValidPermisos',"auth:sanctum")->post("/personas","API\PersonaController@guardar"); //APLICA MIDDLEWARE
route::middleware('ValidAdmin',"auth:sanctum")->delete("/personas/{id?}","API\PersonaController@destroy");
route::middleware('ValidPermisos',"auth:sanctum")->put("/personas/{id?}","API\PersonaController@update");
//TABLA COMENTARIOS
route::middleware("auth:sanctum")->get("/comentarios/{id?}","API\ComentarioController@index")->where("id", "[0-9]+");
route::middleware('ValidPermisos',"auth:sanctum")->post("/comentarios","API\ComentarioController@guardar");
route::middleware('ValidAdmin',"auth:sanctum")->delete("/comentarios/{id?}","API\ComentarioController@destroy");
route::middleware('ValidPermisos',"auth:sanctum")->put("/comentarios/{id?}","API\ComentarioController@update");
//TABLA PRODUCTOS
route::middleware("auth:sanctum")->get("/productos/{id?}","API\ProductoController@index")->where("id", "[0-9]+");
route::middleware('ValidPermisos',"auth:sanctum")->post("/productos","API\ProductoController@guardar") -> middleware('ver'); //APLICA MIDDLEWARE
route::middleware('ValidAdmin',"auth:sanctum")->delete("/productos/{id?}","API\ProductoController@destroy");
route::middleware('ValidPermisos',"auth:sanctum")->put("/productos/{id?}","API\ProductoController@update");
                                  //TOKENS Y PERMISOS
route::middleware("auth:sanctum")->get('/user',"API\AuthController@index"); //TE ARROJA AL INDEX SEGUN EL TOKEN
route::middleware("auth:sanctum")->delete('/logout',"API\AuthController@logout"); //RUTA DE ELIMINAR TOKENS
route::post("/registro","API\AuthController@registro"); //RUTA DE REGISTRAR USUARIO
route::post("/login","API\AuthController@login"); //RUTA LOGEARSE A USER:INFO
route::middleware("auth:sanctum")->post('/permiso',"API\AuthController@otorgarPermiso"); //RUTA QUE ASIGNA PERMISOS A USUARIO USER:PERMISO
route::middleware("auth:sanctum",'ValidAdmin')->delete('/user/{id?}',"API\AuthController@delete"); //RUTA QUE ELIMINA USUARIOS CON TOKEN ADMIN:ADMIN
route::middleware("auth:sanctum",'ValidPermisos')->put('/newcontraseña/{id?}',"API\AuthController@cambiocontraseña"); //RUTA DE CAMBIO DE CONTRASEÑA ADMIN:ADMIN USER:PERMISO
route::post("/admin","API\AuthController@crearadmin") ->middleware('admin');//CREA ADMINISTRADOR (SOLO PERMITE 1 ADMINSTRADOR)