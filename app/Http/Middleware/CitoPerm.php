<?php

namespace App\Http\Middleware;

use Closure;

class CitoPerm
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
        if(Auth::user()->can('manage-cito') === false)
        {
            return redirect()->back();
        }
        return $next($request);
    }
}
