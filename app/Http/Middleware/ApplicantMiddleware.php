<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ApplicantMiddleware
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
            if($u->isApplicant())
            {
                return $next($request);
            }
            if($u->isAdmin() || $u->isEmployer())
            {
                if($u->isEmployer())
                {
                    $right = "You have no right to post resume";
                    session()->push('right',$right);
                }
                return redirect()->route('check_user_role');
            }
        }
        session()->flash('message', $message);
        return redirect()->route('home');
    }
}
