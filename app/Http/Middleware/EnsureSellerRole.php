<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EnsureSellerRole
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            Log::info('User not authenticated');
            return redirect()->route('login');
        }

        // Pastikan user adalah seller
        if (Auth::user()->role !== 'seller') {
            Log::info('User not seller:', ['role' => Auth::user()->role]);
            return redirect()->route('home');
        }

        Log::info('Seller access granted:', ['user_id' => Auth::id()]);
        return $next($request);
    }
}
