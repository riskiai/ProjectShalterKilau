<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $userLevel): Response
    {
        // Validasi apakah user sudah login dan level sesuai
        if (Auth::check() && Auth::user()->level === $userLevel) {
            return $next($request);
        }

        // Jika level user tidak sesuai, beri respon error 403
        return response()->json(['message' => 'You do not have permission to access this page.'], 403);
    }
}
