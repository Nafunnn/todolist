<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, ...$roles): Response
    // {

    //     dd($roles);
    //     dd(in_array($request->user()->role, $roles));
    //     if (in_array($request->user()->role, $roles)) {
    //         return $next($request);
    //     }
    //         Auth::logout();

    //         $request->session()->invalidate();

    //         $request->session()->regenerateToken();

    //         return redirect('/');

    // }

    public function handle(Request $request, Closure $next, ...$roles): Response
{
    // Check if the user has any of the specified roles
    if (count(array_intersect([$request->user()->role], $roles)) > 0) {
        return $next($request);
    }

    // If the user doesn't have the required role(s), return unauthorized response
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}

}
