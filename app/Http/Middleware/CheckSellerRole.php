<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckSellerRole
{
    public function handle(Request $request, Closure $next)
    {
        // Log untuk debugging
        Log::info('CheckSellerRole middleware running', [
            'is_authenticated' => Auth::check(),
            'user_role' => Auth::check() ? Auth::user()->role : 'not logged in'
        ]);

        // Periksa autentikasi
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please login first.');
        }

        // Periksa role
        if (Auth::user()->role !== 'seller') {
            return redirect()->route('home')
                ->with('error', 'Access restricted to sellers only.');
        }

        return $next($request);
    }
}
