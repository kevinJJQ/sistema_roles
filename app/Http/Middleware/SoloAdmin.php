<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->rol !== 'admin') {
            return redirect()->route('login')
                   ->with('error', 'Acceso solo para administradores.');
        }
        return $next($request);
    }
}