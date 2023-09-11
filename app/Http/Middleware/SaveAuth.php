<?php

namespace App\Http\Middleware;

use App\Http\Service\AuthorizeService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SaveAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $setuser = AuthorizeService::getInstance();
            $setuser->setUser();
        }
        return $next($request);
    }
}
