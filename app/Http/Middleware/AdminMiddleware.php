<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            $u = Auth::user();
            if($u->isAdmin())
            {
                return $next($request);
            }
            if($u->isApplicant() || $u->isEmployer())
            {
                return redirect()->route('check_user_role');
            }
        }

        return redirect()->route('home');
    }
}
