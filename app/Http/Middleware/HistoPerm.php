<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HistoPerm
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
        if(Auth::user()->can('manage-histo') === false)
        {
            flash('No tienes permisos suficientes para ingresar a esa URL!!!', 'warning')->important();
            return redirect()->to('/home');
        }
        return $next($request);
    }
}
