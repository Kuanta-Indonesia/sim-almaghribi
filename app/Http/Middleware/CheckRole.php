<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user() || $request->user()->role->nama !== $role) {
            // If the user does not have the required role, return a 403 Forbidden response
            return redirect('/dashboard');
            // return response()->json(['message' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}
