<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        // Jika route API → gunakan Sanctum
        if ($request->is('api/*')) {
            if (!$request->user('sanctum')) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
            return $next($request);
        }

        // Jika route WEB
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return $next($request);
    }

}