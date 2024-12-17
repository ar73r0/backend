<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Controleer of de gebruiker ingelogd is en admin is
        if (Auth::check() && Auth::user()->isAdmin) {
            return $next($request); // Laat de request doorgaan
        }

        // Zo niet, stuur terug naar homepagina met foutmelding
        return redirect('/')->with('error', 'Je hebt geen toegang tot deze pagina.');
    }
}