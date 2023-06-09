<?php

namespace App\Http\Middleware;

use Closure;

class Ceklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$levels)
    {
        // return $next($request);
        if(in_array($request->user()->level, $levels)){
            return $next($request);
        }
        return redirect('/masyarakat');
    }
}
