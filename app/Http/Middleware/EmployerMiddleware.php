<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmployerMiddleware
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
            if($u->isEmployer())
            {
                return $next($request);
            }

            if($u->isAdmin() || $u->isApplicant())
            {
                if($u->isApplicant())
                {
                    $right = "You have no right to post job";
                    session()->push('right',$right);
                }
                return redirect()->route('check_user_role');
            }
        }
        else
        {
            $message = "Your are not Login SignUp Please";
            session()->flash('message', $message);
        }
        return redirect()->route('home');
    }
}
