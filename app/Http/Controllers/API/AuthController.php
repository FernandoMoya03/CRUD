<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\User;

class AuthController extends Controller
{
    public function index(Request $request) //INDEX CON LOS 3 TIPOS DE PERMISO ESTABLECIDOS (USA SCOPE)
    {
        if(($request->user()->tokenCan('admin:admin')) || $request->user()->tokenCan('user:permiso'))
        {
            return response()->json(["users" => User::all()],200);
        }
        else if ($request->user()->tokenCan('user:info'))
        {
            return response()->json(["perfil" => $request->user()],200);
        }            
        return abort(401, "Scope Invalido");
    }
    public function logOut(Request $request) //BORRA TOKENS DE LA BD
    {
        return response()->json(["afectos"=>$request->user()->tokens()->delete()],200);
    }
    public function logIn(Request $request) //SE LOGEA USUARIO CREANDO UN TOKEN USER:INFO
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password))
        {
            throw ValidationException::withMessages([
                'email|password' => ['Credenciales incorrectas...']
            ]);
        }
        $token = $user ->createToken($request->email,['user:info'])->plainTextToken;
        return response()->json(["token"=>$token],201);
    }
    public function otorgarPermiso(Request $request) //OTORGA PERMISO USER:PERMISO SIEMPRE Y CUANDO EL TOKEN SEA ADMIN:ADMIN
    {
        if($request->user()->tokenCan('admin:admin'))
        {
            $request->validate(['email'=>'required|email']);
        }
        $user = User::where('email', $request->email)->first();
        if(!$user)
        {
            throw ValidationException::withMessages([
                'email' => ['Usuario incorrecto...']
            ]);
        }
        $token = $user ->createToken($request->email, ['user:permiso'])->plainTextToken;
        return response()->json(["token" => $token],201);
    }
    public function registro (Request $request) //REGISTRO DE USUARIO 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save())
        {
            return response()->json($user, 201);
        }
        return abor(400, "Error al general el registro");
    }
    public function delete(Request $request, $id) //SOLO PERMITE BORRAR CON TOKEN ADMIN:ADMIN (USA SCOPE)
    {
            User::destroy($id);
            return response()->json(['messeage' => 'Usuario eliminado correctamente'],200);
    }
    public function cambiocontraseña(Request $request, $id) //SOLO PERMITE CAMBIOS CON TOKENS USER:PERMISO USER:ADMIN (USA SCOPE)
    {
            $update = new User();
            $update = User::find($id);
            $update ->password = Hash::make($request->password);
            $update->save();
            return response()->json([true, 'messeage' => 'Registro modificado correctamente'],200);
    }
    public function crearadmin(Request $request) //SOLO PERMITE UN ADMINISTRADOR 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if(! $user || ! Hash::check($request->password, $user->password))
        {
            throw ValidationException::withMessages([
                'email|password' => ['Credenciales incorrectas...']
            ]);
        }
        $token = $user ->createToken($request->email,['admin:admin'])->plainTextToken;
        return response()->json(["token"=>$token],201);
    }
}
// token admin admin 18|Ohvx5Y4kpUrvBrfGkeOFnq6D90oxbbpWC12lBKTl
// token user info 15|VcxsP8avJDSOT2LotMVPk16ERy5rrC222x3GlnRE
// token user permiso 16|kX5V6vJorB6bAjq8qOAl6GhflWJEg6nas4avE7Ar