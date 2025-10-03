<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Check if admin is logged in using session
        if (!$request->session()->has('admin_id')) {
            // Redirect to admin login if not logged in
            return redirect()->route('adminLogin')->with('error', 'Please login first.');
        }

        return $next($request);
    }
}
