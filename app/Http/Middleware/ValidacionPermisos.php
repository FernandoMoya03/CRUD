<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\User;

class ValidacionPermisos
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
        if(($request->user()->tokenCan('admin:admin')) || $request->user()->tokenCan('user:permiso'))
        {
            return $next($request);
        }          
        return abort(401, "Scope Invalido, Token sin permiso");
    }
}
