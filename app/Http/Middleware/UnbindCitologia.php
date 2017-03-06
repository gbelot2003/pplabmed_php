<?php

namespace App\Http\Middleware;

use Closure;

class UnbindCitologia
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
        if(Auth::user()->can('unbind-cito') === false)
        {
            return redirect()->back();
        }

        return $next($request);
    }
}
