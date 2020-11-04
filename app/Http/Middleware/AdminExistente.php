<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\User;
class AdminExistente
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
        $results = DB::select('select * from personal_access_tokens where abilities = :abilities', ['abilities' => '["admin:admin"]']);
        if($results)
        {
            if('["admin:admin"]' == $results[0]->abilities)
            {
                return response()->json(['messeage' => 'Ya existe un administrador....'],200); 
            }   
        }
        return $next($request);
    }
}
