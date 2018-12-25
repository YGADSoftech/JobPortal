<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Support\Facades\Auth;
class MessageSystemRoleChecker
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
        $message = "Your are not Login SignUp Please";
        if(Auth::check())
        {
            $u = Auth::user();
            if($u->isAdmin() || $u->isApplicant() || $u->isEmployer())
            {
                return $next($request);
            }
        }
        session()->flash('message', $message);
        return redirect()->route('home');
    }
}
