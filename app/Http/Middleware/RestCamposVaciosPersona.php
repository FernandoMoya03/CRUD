<?php

namespace App\Http\Middleware;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Modelos\Persona;
use Closure;

class RestCamposVaciosPersona
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->nombre == "")
        {
            return response()->json(['messeage' => 'Favor de insertar Nombre'],400); 
        }
        elseif($request->apellido_pat == "")
        {
            return response()->json(['messeage' => 'Favor de insertar Apellido Paterno'],400); 
        }
        elseif($request->apellido_mat == "")
        {
            return response()->json(['messeage' => 'Favor de insertar Apellido Materno'],400); 
        }
        return $next($request);
    }
}
