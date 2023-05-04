<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $method_authenticate, $profile): Response
    {   
        session_start();
        if(isset($_SESSION['id']) && $_SESSION['id'] != ''):
            return $next($request);
        else:
            return redirect()->route('login', ['error' => 'expired']);
        endif;
    }
}
