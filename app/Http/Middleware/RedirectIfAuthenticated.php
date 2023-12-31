<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if ($request->is('admin/*')) {
            if (Auth::guard('admin')->check()) {
                return route('admin.home');
            }
        }
        elseif ($request->is('employer/*')) {
            if (Auth::guard('employer')->check()) {
                return route('employer.home');
            }
        }
        elseif (Auth::check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
