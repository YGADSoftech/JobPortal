<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectMiddleware
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

            if(Auth::user()->user_type_id==1)
            {
//                dd("What1");
                    return redirect()->route('adminProfile');
            }
            if(Auth::user()->user_type_id==2)
            {
                if(session()->has('jobapplyid'))
                {
//                    dd("What3");
                    return redirect()->route('viewjob',session()->get('jobapplyid'));
                }
                else
                {
//                    dd("What4");
                    return redirect()->route('applicantProfile');
                }
            }
            if(Auth::user()->user_type_id==3)
            {
//                dd("What5");
                    return redirect()->route('employerProfile');
            }
        }
        return $next($request);
    }
}
