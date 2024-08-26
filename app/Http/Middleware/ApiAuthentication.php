<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = $request->all();
        if ( !isset($data["api_key"]) ||
        isset($data['api_key']) && ( $data["api_key"] !== config("app.api_key"))) {
            return response()->json([
                'success' => false,
                "message" => "invalid authentication"
            ]);
        }

        return $next($request);

    }
}
