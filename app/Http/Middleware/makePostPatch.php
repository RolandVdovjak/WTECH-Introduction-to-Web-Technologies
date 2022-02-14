<?php

namespace App\Http\Middleware;



use Closure;

class makePostPatch
{
    public function handle($request, Closure $next)
    {
        $request->setMethod('PATCH');
        return $next($request);
    }
}
