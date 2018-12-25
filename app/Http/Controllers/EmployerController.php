<?php

namespace App\Http\Controllers;

use App\EmployerProfile;
use App\Gender;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class EmployerController extends Controller
{

    private $shown = false;
    private $total_messages = 0;
    private $user_data = array();
    private $time = array();
    private $ids = array();
    private $i = 0;

    /* --------------------------------------------- Start Employer Profile Section --------------------------------------------- */

    public function viewprofile()
    {
        $user = Auth::user();
        $profile = EmployerProfile::whereUserId($user->id)->first();

        $this->check_notification($user);

        //Check Message in Message Table
        $u = $user;


        $this->check_messages($u);



        return view('Employer.ManageProfile.showprofile')->with('pro',$profile)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);
    }

    public function updateprofile(Request $req)
    {

        $rules=array(
            "fname" => 'required|alpha',
            "lname" => 'required|alpha',
            "uname" => 'required|min:6',
            "cn" => 'required|integer',
            "dob" => 'required|date',
            "gender" => 'required|not_in:0',
            "profile_img" => 'image',

            
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
            );
        $validate = Validator::make($req->all(),$rules,$message);

        if($validate->fails())
        {
            
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {
        $user = Auth::user();
        $pro_name="employer.png";

        if($user->profile_img != "employer.png")
        {
            $pro_name = $user->profile_img;
        }
        if ($user != null)
        {
            if ($f = $req->file('profile_img')) {
                if($user->profile_img != "employer.png")
                {
                    $old_image = 'Images/profile/'.$user->profile_img;
                    File::delete($old_image);
                }
               
                $pro_name = (time() . '_' . $f->getClientOriginalName());
                $f->move('Images/profile', $pro_name);
            }
            $user->profile_img = $pro_name;
            $user->user_name = $req->get('uname');
            $user->save();

            $profile = EmployerProfile::whereUserId($user->id)->first();
            $profile->first_name = $req->get('fname');
            $profile->last_name = $req->get('lname');
            $profile->contact_number = $req->get('cn');

            $profile->dob = $req->get('dob');
            $profile->profile_completed = 1;
            $gender = Gender::where("gender_type", "=", $req->get('gender'))->first();
            $gender->applicantprofile()->save($profile);
            return redirect()->route('viewEmployerProfile');
        }
    }
    }

    public function  editprofile()
    {
        $user = Auth::user();
       $profile = EmployerProfile::whereUserId($user->id)->first();
        $this->check_notification($user);

        //Check Message in Message Table
        $u = $user;


        $this->check_messages($u);

        return view('Employer.ManageProfile.updateprofile')->with('pro',$profile)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);;
    }
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

            $profile = EmployerProfile::whereUserId($user->id)->first();
            if ($this->is_user_complete_profile($user)) { // Profile Not Completed
                return view('employer.profile')->with('shown',$this->shown)->with('total_message',$this->total_messages)
                    ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$no_right)->with('user',$user);

            } elseif ($profile->profile_completed == 1) { // Profile completed
                //Check Message in Message Table

                $this->check_notification($user);

                //Check Message in Message Table
                $u = $user;


                $this->check_messages($u);
                $company = \App\CompanyInfo::where('employer_profiles_id','=',Auth::id())->get();
                $tot_user = \App\User::all();
                $total_job_posted = \App\Job::all();
                $user_jobs_posted = \App\Job::all()->where('user_id','=',Auth::id());
                return view('employer.dashboard')->with('shown',$this->shown)->with('total_message',$this->total_messages)
                    ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$no_right)->with('user',$user)->with('com',$company)->with('tot_user',$tot_user)
                    ->with('tot_job_posted',$total_job_posted)->with('user_jobs_posted',$user_jobs_posted);

            }
        }

    }

    public function is_user_complete_profile($u)
    {
        return $u->employer_profile->profile_completed == 0?1:0;
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
            "fname" => 'required|alpha',
            "lname" => 'required|alpha',
            "uname" => 'required|min:6',
            "cn" => 'required|integer',
            "dob" => 'required|date',
            "gender" => 'required|not_in:0',
            "profile_img" => 'image',

            
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
        if ($user != null)
        {

            if ($f = $req->file('profile_img')) {
                $pro_name = (time() . '_' . $f->getClientOriginalName());
                $f->move('Images/profile', $pro_name);
            }
            $user->profile_img = $pro_name;
            $user->user_name = $req->get('uname');
            $user->save();

            $profile = EmployerProfile::whereUserId($user->id)->first();
            $profile->first_name = $req->get('fname');
            $profile->last_name = $req->get('lname');
            $profile->contact_number = $req->get('cn');

            $profile->dob = $req->get('dob');
            $profile->profile_completed = 1;
            $gender = Gender::where("gender_type", "=", $req->get('gender'))->first();
            $gender->applicantprofile()->save($profile);
            return redirect()->route('employerProfile');
        }
    }
    }
    /* --------------------------------------------- End Employer Profile Section --------------------------------------------- */


    public function ViewApplyApplicants()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $this->check_notification($user);

        //Check Message in Message Table
        $u = $user;


        $this->check_messages($u);



        $applicant =  array();
        $job =  array();
        $i = 0;
        foreach($user->employer_job as $k)
        {
            foreach ($k->applied_user_for_jobs as $z)
            {
                $applicant[ $i] = ($z);
                $job[ $i++] = ($k);
            }

        }
        return view('Employer.ManageApplicants.viewapplyapplicant')->with('applicant',$applicant)->with('job',$job)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);

    }

    public function viewspecifiedapplicant($id)
    {
        $user = User::find($id);
        $this->check_notification($user);

        //Check Message in Message Table
        $u = $user;


        $this->check_messages($u);
        return view('Employer.ManageApplicants.viewspecifiedapplicant')->with('id',$id)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);

    }



}
