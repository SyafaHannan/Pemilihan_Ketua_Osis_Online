<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if (Auth::guard('admin')->check()) {
            if (in_array(Auth::guard('admin')->user()->role, $role)) {
                return $next($request);
            } else {
                return back()->with('error','Kamu Tidak Mendapat Akses Ke Halaman Ini');
            }
        }
        return redirect('auth');
    }
}
