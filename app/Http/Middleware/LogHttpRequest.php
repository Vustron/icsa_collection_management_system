<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogHttpRequest
{
    public function handle($request, Closure $next)
    {
        Log::info("HTTP Request Logged:", [
            "method" => $request->method(),
            "url" => $request->fullUrl(),
            "parameters" => $request->all(),
            "timestamp" => now()->toDateTimeString(),
        ]);
        return $next($request);
    }
}
