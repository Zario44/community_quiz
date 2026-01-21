<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        // Si l'utilisateur n'est pas connecté OU qu'il n'est pas admin...
        if (!Auth::check() || Auth::user()->is_admin !== true) {
            
            // ... On le vire (Redirection ou Erreur)
            abort(403, "Accès interdit");
        }

        // Si on arrive ici, c'est que tout est bon. On passe la main à la suite.
        return $next($request);
    }
}
