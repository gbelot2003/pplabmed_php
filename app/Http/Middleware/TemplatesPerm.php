<?php

namespace App\Http\Middleware;

use Closure;

class TemplatesPerm
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
        if(Auth::user()->can('manage-templates') === false)
        {
            return redirect()->back();
        }
        return $next($request);
    }
}
