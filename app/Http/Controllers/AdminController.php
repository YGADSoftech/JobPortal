<?php

namespace App\Http\Controllers;

use App\AdminProfile;
use App\ApplicantProfile;
use App\EmployerProfile;
use App\Gender;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    private $shown = false;
    private $total_messages = 0;
    private $user_data = array();
    private $time = array();
    private $ids = array();
    private $i = 0;

    public function login(Request $req)
    {
        $user = User::where("user_type_id","=","1")->first();
        if(count($user)>0)
        {
            $rules=array(
                'uemail'=>'required|email',
                'upassword'=>'required|min:6'
            );

            $message= array(
                'uemail.required'=>"Email is required",
                'uemail.email'=>"Email is not in correct formate",
                'upassword.required'=>"Password is Required",
                'upassword.min'=>"Password Must not be less then 6 Digits",
            );
            $validate = Validator::make($req->all(),$rules,$message);

            if($validate->fails())
            {
                return Redirect::back()->withErrors($validate->errors());
            }
            else
            {
                $email = $req->get('uemail');
                $password = $req->get('upassword');
                if(Auth::attempt(['email' =>  $email, 'password' => $password, 'user_type_id' => 1]))
                {

                    return redirect()->route('check_user_role');

                }
                else
                {
                    return redirect()->back()->with("msg","Email or Password is incorrect")->with('signin','signin');
                }
            }
        }
        else
        {
            return \redirect()->route('registration');
        }

    }

    public function store(Request $req)
    {

        $rules=array(
            'uemail'=>'required|email|unique:users,email',
            'ruemail'=>'required|same:uemail',
            'upassword'=>'required|min:6',
            'rupassword'=>'required|same:upassword',
        );

        $message= array(
            'uemail.required'=>"Email is required",
            'uemail.email'=>"Email is not in correct formate",
            'uemail.same'=>"The email does not match",
            'uemail.unique'=>"This email is already is in use",
            'ruemail.required'=>"Confirm Email is required",
            'ruemail.email'=>"Confirm Email is not in correct formate",
            'ruemail.same'=>"The email does not match",
            'upassword.required'=>"Password is Required",
            'upassword.min'=>"Password Must not be less then 6 Digits",
            'upassword.same'=>"The password does not match",
            'rupassword.required'=>"Confirm Password is Required",
            'rupassword.min'=>"Confirm Password Must not be less then 6 Digits",
            'rupassword.same'=>"The password does not match"
        );

        $validate = Validator::make($req->all(),$rules,$message);

        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors());
        }
        else {
            $role = UserType::where(['role_name'=>$req->get('user_type')])->firstOrFail();
            $u = new User();
            $u->email = $req->get('uemail');
            $u->password=bcrypt($req->get('upassword'));
            $u->is_active = 1;
            $u->user_name = "Admin";
            $u->profile_img = "admin.png";
            $role->users()->save($u);


            $user = User::orderBy('id', 'desc')->first();

            $profile = new AdminProfile();
            $user->admin_profile()->save($profile);
            session()->flash('msg', "You are Successfully Register");
            return Redirect::back()->with('signup','signup');
        }
    }

    public  function register()
    {
        $u = User::where("user_type_id","=","1")->get();
        return view('Admin.signup')->with("u",$u);
    }


    /* --------------------------------------------- Start Admin Profile Section --------------------------------------------- */

    public function profile()
    {

            $user = Auth::user();
            $this->check_notification($user);
            $this->check_messages($user);

            if($user != null) {
                $profile = AdminProfile::whereUserId($user->id)->first();
                if ($profile->profile_completed == 0) { // Profile Not Completed
                    return view('admin.profile')->with('pro',$profile)->with('shown',$this->shown)->with('total_message',$this->total_messages)
                        ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);;

                } elseif ($profile->profile_completed == 1) { // Profile completed
                    return view('admin.dashboard')->with('pro',$profile)->with('shown',$this->shown)->with('total_message',$this->total_messages)
                        ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);
                    ;
                }
            }
    }

    public function storeProfile(Request $req)
    {
        $user = Auth::user();
        if ($user != null)
        {
            $pro_name="admin.png";

            if ($f = $req->file('profile_img')) {
                $pro_name = (time() . '_' . $f->getClientOriginalName());
                $f->move('Images/profile', $pro_name);
            }
            $user->profile_img = $pro_name;
            $user->user_name = $req->get('uname');
            $user->save();

            $profile = AdminProfile::whereUserId($user->id)->first();
            $profile->first_name = $req->get('fname');
            $profile->last_name = $req->get('lname');
            $profile->contact_number = $req->get('cn');

            $profile->dob = $req->get('dob');
            $profile->profile_completed = 1;
            $gender = Gender::where("gender_type", "=", $req->get('gender'))->first();
            $gender->adminprofile()->save($profile);
            return redirect()->back();
        }

    }

    public  function updateadminprofile(Request $req)
    {

        $user = Auth::user();
        $pro_name=$u->profile_img;
        if ($user != null)
        {

            if ($f = $req->file('profile_img')) 
            {
                if($user->profile_img != "admin.png")
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

            $profile = AdminProfile::whereUserId($user->id)->first();
            $profile->first_name = $req->get('fname');
            $profile->last_name = $req->get('lname');
            $profile->contact_number = $req->get('cn');

            $profile->dob = $req->get('dob');
            $profile->profile_completed = 1;
            $gender = Gender::where("gender_type", "=", $req->get('gender'))->first();
            $gender->adminprofile()->save($profile);
            return redirect()->route('viewAdminProfile');
        }
    }
    /* --------------------------------------------- End Admin Profile Section --------------------------------------------- */

    public function showadminprofile()
    {
        $user = Auth::user();
        $profile = AdminProfile::whereUserId($user->id)->first();

        $this->check_notification($user);

        //Check Message in Message Table
        $u = $user;


        $this->check_messages($u);



        return view('Admin.ManageProfile.showprofile')->with('pro',$profile)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);

    }

    public function editadminprofile()
    {
        $user = Auth::user();
        $profile = AdminProfile::whereUserId($user->id)->first();

        $this->check_notification($user);

        //Check Message in Message Table
        $u = $user;


        $this->check_messages($u);



        return view('Admin.ManageProfile.updateprofile')->with('pro',$profile)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);

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
}
