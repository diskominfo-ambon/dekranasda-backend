<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RedirectIfXMLHttp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->ajax()) {
            return new JsonResponse([
                'data' => [
                    'message' => 'Metode ini hanya untuk ajax handle'
                ],
                'error' => true
            ], 401);
        }

        return $next($request);
    }
}
