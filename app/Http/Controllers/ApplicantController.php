<?php

namespace App\Http\Controllers;

use App\ApplicantProfile;
use App\Gender;
use App\Job;
use App\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\Matcher\Not;
class ApplicantController extends Controller
{

    private $shown = false;
    private $total_messages = 0;
    private $user_data = array();
    private $time = array();
    private $ids = array();
    private $i = 0;
    /*-------------------------------------------------- Start Applicant Manage Apply Jobs Section ---------------------------------*/
    public function unapplyjob(Request $req)
    {
        $u = Auth::user();

        $u->apply_job()->detach ($req->get('job_id'));
        return \redirect()->back();

    }

    public function viewapplyjobs()
    {
        $u = Auth::user();
        $no_right="";
        $this->check_notification($u);
        $this->check_messages($u);
    return view('Applicant.ManageApplyJobs.viewapplyjob')->with('u',$u)->with('shown',$this->shown)->with('total_message',$this->total_messages)
        ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$no_right);

    }
    /*-------------------------------------------------- End Applicant Manage Apply Jobs Section ---------------------------------*/

    public function applyjob()
    {
        $id=session()->get('jobapplyid');
        session()->forget('jobapplyid');
       // dd(session()->get('jobapplyid'));
        $isApply = false;
        $u = Auth::user();
        foreach ($u->apply_job as $aj) {
            if($id==$aj->id)
            {
                $isApply = True;
            }
        }
        if(!$isApply) {
            $u->apply_job()->attach($id,['apply_date'=>date("Y/m/d")]);

            $not = new Notification;
            $not->user_id = Job::find($id)->user_id;
            $not->post_job_id = $id;
            $not->notification_type_id = 1;
            $not->expiry_date = Carbon::tomorrow();
            $not->is_seen = 0;
            $not->save();
        }
        else
        {
            dd("You already applyed");
        }

        return redirect()->route('viewapplyjobs');
    }


    /* --------------------------------------------- Start Applicant Profile Section --------------------------------------------- */

    public function profile()
    {
        if(session()->has('right'))
        {
            $no_right = session()->pull('right')[0];
        }
        else
        {
            $no_right = "";
        }

        $user = Auth::user();
        if($user != null) {
            $profile = ApplicantProfile::whereUserId($user->id)->first();
            if ($this->is_user_complete_profile($user))
            { // Profile Not Completed
                return view('applicant.profile')->with('shown',$this->shown)->with('total_message',$this->total_messages)
                    ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$no_right)->with('user',$user);
            }
            elseif ($profile->profile_completed == 1) { // Profile completed
                //Check Notification in Notification Table if there is any
                $this->check_notification($user);

                //Check Message in Message Table
                $u = $user;


                $this->check_messages($u);
                $company = \App\CompanyInfo::all();
                $tot_user = \App\User::all();
                $total_job_posted = \App\Job::all();
                $user_jobs_applied = Auth::user()->apply_job()->get();
                return view('applicant.dashboard')->with('shown',$this->shown)->with('total_message',$this->total_messages)
                    ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$no_right)->with('user',$user)
                    ->with('company',$company)->with('tot_user',$tot_user)->with('total_job_posted',$total_job_posted)->with('user_jobs_applied',$user_jobs_applied);
            }
        }
    }

    public function is_user_complete_profile($u)
    {
        return $u->applicant_profile->profile_completed == 0?1:0;
    }
    public function check_notification($user)
    {
        foreach($user->notify as $no) {

            if( $no->is_seen == 0)
            {
                $this->shown = true;
            }

        }
    }

    public function check_messages($u)
    {
        if (count($u->user_1_conversation) > 0) {
            $con = $u->user_1_conversation;
            foreach ($con as $c) {
                foreach ($c->message as $mess) {
                    if ($mess->is_user_1_seen == 0) {
                        $this->total_messages++;
                        $this->user_data[$this->i] = $mess->message_text;
                        $d = $mess->message_send_at;
                        $this->ids[$this->i] = $mess->conversation->user_2_reference->id;
                        $this->time[$this->i] = date('h:i', strtotime($d)) . ' ' . date('a', strtotime($d));
                        $this->i++;
                    }
                }
            }
        } else {
            $con = $u->user_2_conversation;
            foreach ($con as $c) {
                foreach ($c->message as $mess) {
                    if ($mess->is_user_2_seen == 0) {
                        $this->total_messages++;
                        $this->user_data[$this->i] = $mess->message_text;
                        $d = $mess->message_send_at;
                        $this->ids[$this->i] = $mess->conversation->user_1_reference->id;;
                        $this->time[$this->i] = date('h:i', strtotime($d)) . ' ' . date('a', strtotime($d));
                        $this->i++;
                    }
                }
            }

        }
    }

    public function storeProfile(Request $req)
    {
        $rules=array(
            'fname'=>'required|alpha',
            'lname'=>'required|alpha',
            'uname'=>'required|min:6',
            'cn'=>'required|integer',
            'dob'=>'required|date',
            'gender'=>'required|not_in:0',
            'profile_img'=>'image',
            'resume'=>'required|file',
        );

        $message= array(
            'fname.required'=>"First Name is Required",
            'fname.alpha'=>"Only Letter are Allowed for First Name",
            'lname.required'=>"Last Name is Required",
            'lname.alpha'=>"Only Letter are Allowed for Last Name",
            'uname.required'=>"User Name is Required",
            'uname.min'=>"User Name Cannot Be Not Less Then Six Letters",
            'cn.required'=>"Contact Number is Required",
            'cn.integer'=>"Contact Number only Accept Integer Values",
            'dob.required'=>"Date of Birth is Required",
            'dob.date'=>"Date of Birth is not in d/m/y Formate",
            'gender.required'=>"Gender is Required",
            'profile_img.image'=>"Profile Image is not a jpeg, png, bmp, gif, or svg file",
            'resume.required'=>"Resume is Required",
            'resume.file'=>"File not uploaded",
            );

        $validate = Validator::make($req->all(),$rules,$message);

        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {

        $user = Auth::user();
        $pro_name=$user->profile_img;

        if($user != null)
        {
            if($f = $req->file('profile_img'))
            {
                $pro_name = (time() . '_' .$f->getClientOriginalName());
                $f->move('Images/profile',$pro_name);
            }
            $user->profile_img = $pro_name;
            $user->user_name = $req->get('uname');
            $user->save();

            $profile = ApplicantProfile::whereUserId($user->id)->first();
            $profile->first_name = $req->get('fname');
            $profile->last_name = $req->get('lname');
            $profile->contact_number = $req->get('cn');
            if($f = $req->file('resume'))
            {
                $res_name = (time() . '_' .$f->getClientOriginalName());
                $f->move('Images/resume',$res_name);
            }
            $profile->user_resume = $res_name;
            $profile->dob = $req->get('dob');
            $profile->profile_completed = 1;
            $gender = Gender::where("gender_type","=",$req->get('gender'))->first();
            $gender->applicantprofile()->save($profile);
            return redirect()->back();
        }
    }
    }
    public function viewprofile()
    {
        $no_right="";
        $user = Auth::user();
        $profile = ApplicantProfile::whereUserId($user->id)->first();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Applicant.ManageProfile.showprofile')->with('pro',$profile)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$no_right)->with('user',$user);;
    }
    public function  editprofile()
    {
        $no_right="";
        $user = Auth::user();
        $this->check_notification($user);
        $this->check_messages($user);
        $profile = ApplicantProfile::whereUserId($user->id)->first();
        return view('Applicant.ManageProfile.updateprofile')->with('pro',$profile)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$no_right)->with('user',$user);;
        ;
    }
    public function updateprofile(Request $req,$id)
    {

        $rules=array(
            'fname'=>'required|alpha',
            'lname'=>'required|alpha',
            'uname'=>'required|min:6',
            'cn'=>'required|integer',
            'dob'=>'required|date',
            'gender'=>'required|not_in:0',
            'profile_img'=>'nullable|image',
            'resume'=>'nullable|file',
        );

        $message= array(
            'fname.required'=>"First Name is Required",
            'fname.alpha'=>"Only Letter are Allowed for First Name",
            'lname.required'=>"Last Name is Required",
            'lname.alpha'=>"Only Letter are Allowed for Last Name",
            'uname.required'=>"User Name is Required",
            'uname.min'=>"User Name Cannot Be Not Less Then Six Letters",
            'cn.required'=>"Contact Number is Required",
            'cn.integer'=>"Contact Number only Accept Integer Values",
            'dob.required'=>"Date of Birth is Required",
            'dob.date'=>"Date of Birth is not in d/m/y Formate",
            'gender.required'=>"Gender is Required",
            'profile_img.image'=>"Profile Image is not a jpeg, png, bmp, gif, or svg file",
            'resume.file'=>"File not uploaded",
            );

        $validate = Validator::make($req->all(),$rules,$message);

        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {

        $em_pro = ApplicantProfile::findOrFail($id);

        $user = Auth::user();
        $pro_name="applicant.png";

        if($user->profile_img != "applicant.png")
        {
            $pro_name = $user->profile_img;
        }
        if($f = $req->file('profile_img'))
        {
            if($user->profile_img != "applicant.png")
            {
                $old_image = 'Images/profile/'.$em_pro->user->profile_img;
                File::delete($old_image);
            }
            $pro_name = (time() . '_' .$f->getClientOriginalName());
            $f->move('Images/profile',$pro_name);
            $user->profile_img=$pro_name;

        }
        if($f = $req->file('resume'))
        {
            $old_resumee = 'Images/resume/'.$em_pro->user_resume;
            File::delete($old_resumee);
            $res_name = (time() . '_' .$f->getClientOriginalName());
            $f->move('Images/resume',$res_name);
            $em_pro->user_resume = $res_name;

        }

        $user->user_name = $req->get('uname');
        $user->save();

        $em_pro->first_name = $req->get('fname');
        $em_pro->last_name = $req->get('lname');
        $em_pro->contact_number = $req->get('cn');
        $em_pro->dob = $req->get('dob');
        $em_pro->profile_completed = 1;
        $gender = Gender::where("gender_type","=",$req->get('gender'))->first();
        $gender->applicantprofile()->save($em_pro);
        $em_pro->save();

        return redirect()->route('applicantProfile');
    }
    }
    /* --------------------------------------------- End Applicant Profile Section --------------------------------------------- */


    /*----------------------------------------------Starting Search Job Part ---------------------------------------------------*/
    public function viewsearchform(Request $request)
    {

       if(count($request->all())>1)
       {
           $rules=array(
               'jobTitle'=>'required|string',
               'jobType'=>'required|integer',
           );

           $message= array(
               'jobTitle.required'=>"Title is required",
               'jobTitle.string'=>"Input String is not in string",
               'jobType.required'=>"Type is Required",
               'jobType.integer'=>"Please Choose Job Type"
           );

           $validate = Validator::make($request->all(),$rules,$message);

           if($validate->fails())
           {
               return Redirect::back()->withErrors($validate->errors())->with('seachform', "seachform");
           }
           else
           {
               $jobs = Job::where('title','LIKE', '%'.$request->jobTitle.'%')->where('job_type_id',"=",$request->jobType)->get();
           }
       }
       else
       {
           $jobs = \App\Job::all();
       }

        return view('searchjobs')->with('jobs',$jobs);
    }

    public function searchjobs(Request $req)
    {
        if(empty($req->get('jobTitle') ))
        {
            $jobs = \App\Job::all();
        }
        else
        {
            $jobs = \Illuminate\Support\Facades\DB::table('jobs')->where('title','Like','%'.$req->get('jobTitle').'%')->get();
        }
        return view('searchjobs')->with('jobs',$jobs);
    }
    /*----------------------------------------------Ending Search Job Part ---------------------------------------------------*/
}

