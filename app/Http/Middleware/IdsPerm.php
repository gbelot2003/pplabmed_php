<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IdsPerm
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
        if(Auth::user()->can('manage-ids') === false)
        {
            flash('No tienes permisos suficientes para ingresar a esa URL!!!', 'warning')->important();
            return redirect()->to('/home');
        }
        return $next($request);
    }
}
