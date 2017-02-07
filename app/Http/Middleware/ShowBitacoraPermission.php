<?php

namespace App\Http\Middleware;

use Closure;

class ShowBitacoraPermission
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
        if(Auth::user()->can('show-bitacora') === false)
        {
            return redirect()->back();
        }

        return $next($request);
    }
}
