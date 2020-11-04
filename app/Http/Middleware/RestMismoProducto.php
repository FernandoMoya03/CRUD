<?php

namespace App\Http\Middleware;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Modelos\Producto;
use Closure;


class RestMismoProducto
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $hi = $request->NombreProducto;
        $results = DB::select('select * from productos where NombreProducto = :NombreProducto', ['NombreProducto' => $hi]);
        Log::info($results);
        if($results)
        {
            if($hi == $results[0]->NombreProducto)
            {
                return response()->json(['messeage' => 'Producto ya ha sido creado'],400); 
            }    
        }
        return $next($request);
    } 
}
