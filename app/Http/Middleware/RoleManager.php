<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $authUserRole = Auth::user()->role;
    
        switch ($role) {
            case 'admin':
                if ($authUserRole == 0) { // Role untuk admin
                    return $next($request);
                }
                break;
    
            case 'customer':
                if ($authUserRole == 1) { // Role untuk customer
                    return $next($request);
                }
                break;
        }
    
        // Jika role tidak sesuai, arahkan ke halaman default sesuai role
        if ($authUserRole == 0) {
            return redirect()->route('admin'); // Admin
        } elseif ($authUserRole == 1) {
            return redirect()->route('dashboard'); // Customer
        }
    
        return redirect()->route('login'); // Default jika tidak ada role yang cocok
    }
    // public function handle(Request $request, Closure $next, $role): Response
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login');
    //     }
    //     $authUserRole = Auth::user()->role;
    //     switch ($role) {
    //         case 'admin':
    //             if ($authUserRole == 0) {
    //                 return $next($request);
    //             }
    //             break;

    //         case 'customer':
    //             if ($authUserRole == 1) {
    //                 return $next($request);
    //             }
    //             break;
    //     }
    //     switch ($authUserRole) {
    //         case 0:
    //             return redirect()->route('admin');
    //         case 1:
    //             return redirect()->route('dashboard');
    //     }
    //     return redirect()->route('login');
    // }
}
