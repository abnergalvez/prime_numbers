<?php

namespace App\Http\Middleware;

use Closure;

class MaxPrimeNumberMiddleware
{
    public function handle($request, Closure $next)
    {
        $value = $request->maxNumber;
        
        if (!is_numeric($value)) {
            return response()->json(['error' => 'The value must be numeric'], 400);
        }

        return $next($request);
    }
}