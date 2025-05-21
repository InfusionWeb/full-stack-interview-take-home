<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiKey;

class ValidateApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = ApiKey::where('key', $request->bearerToken())->first();
        if (!$apiKey) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $apiKey->updateUsedAt();

        return $next($request);
    }
}
