<?php

namespace App\Http\Middleware;

use Closure;

class EditMorfologiaPermission
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
        if(Auth::user()->can('edit-morfologia') === false)
        {
            return redirect()->back();
        }

        return $next($request);
    }
}
