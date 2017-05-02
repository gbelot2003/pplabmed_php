<?php

namespace App\Http\Middleware;

use Closure;

class RolsPerm
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
        if(Auth::user()->can('manage-rols') === false)
        {
            return redirect()->back();
        }
        return $next($request);
    }
}
