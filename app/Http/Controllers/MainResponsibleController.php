<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class MainResponsibleController extends Controller
{

    public function gotoApplicantApplyRouteAfterApplyClick(Request $req)
    {
        $id = $req->get('id');


        if(\Illuminate\Support\Facades\Auth::check())
        {
            if($id)
            {
                session(["jobapplyid"=>$id]);
            }
            return redirect()->route('app');
        }
        else
        {
            session(["jobapplyid"=>$id]);

            return redirect()->back()->with("msg","You are not Login")->with('login','login');
        }
    }
    public  function  viewjob($id)
    {
        $job = Job::findOrFail($id);
        $u = Auth::user();

        $apply = false;
        if($u != null)
        {
            foreach ($u->apply_job as $aj) {
                if($id==$aj->id)
                {
                    $apply = True;
                }
            }
        }
       
        return view('viewjobspage')->with('job',$job)->with('apply',$apply);

    }
    public function home()
    {
        $job_type = JobType::all();
        //Get the count of user from the database
        $user = User::all();
        if($user != null)
        {
            $user_count = $user->count();
        }
        else
        {
            $user_count = 0;
        }
        //Get Total Jobs Posted in the database
        $jobs = Job::orderby('id','desc')->limit(5)->get();
        if($jobs!=null)
        {
            $job_count = Job::all()->count();
        }
        else
            {
            $job_count = 0;
        }
        //Get the Total Avaiable Jobs From the Database
        $jobs_avail = Job::where('expire_job','>', Carbon::now())->get();
        if($jobs_avail!=null)
        {
            $job_avail_count = count($jobs_avail);
        }
        else
            {
            $job_avail_count = 0;
        }
        return view('home',compact('user_count'))->with('jobs',$jobs)->with('job_count',$job_count)->with('job_type',$job_type)->with('job_avail_count',$job_avail_count);
    }


}
