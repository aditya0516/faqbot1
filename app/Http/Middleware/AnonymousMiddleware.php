<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AnonymousMiddleware
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
        if ($request->user() && $request->user()->role != 'anonymous')
        {
            return new Response(view('unauthorized')->with('role', 'ANONYMOUS'));
        }
        return $next($request);

    }
}
