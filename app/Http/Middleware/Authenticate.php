<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('Auth Middleware Check', [
            'is_authenticated' => Auth::check(),
            'user_id' => Auth::id(),
            'session_id' => session()->getId(),
            'url' => $request->url()
        ]);
        
        if (!Auth::check()) {
            \Log::warning('Not authenticated, redirecting to login');
            return redirect()->route('login');
        }
        
        return $next($request);
    }
}