<?php

namespace App\Http\Middleware;

use Closure;

class AdminProfileCheck
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
        $u = \Illuminate\Support\Facades\Auth::user();
        if($u->admin_profile->profile_completed == 1)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('adminProfile');
        }
    }
}
