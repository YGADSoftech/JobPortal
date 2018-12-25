<?php

namespace App\Http\Controllers;

use App\AdminProfile;
use App\ApplicantProfile;
use App\EmployerProfile;
use App\Role;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserRegistration extends Controller
{
    public function signup(Request $req)
    {
//        dd($req->all());

        $rules=array(
            'uemail'=>'required|email|unique:users,email',
            'ruemail'=>'required|same:uemail',
            'upassword'=>'required|min:6',
            'rupassword'=>'required|same:upassword',
            'user_type'=>'required|string'
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
            'rupassword.same'=>"The password does not match",
            'user_type.required'=>"User Type is Required",
            'user_type.string'=>"Please Choice User Type"

        );

        $validate = Validator::make($req->all(),$rules,$message);

        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors())->with('signup', "signup");
        }
        else
        {
            $role = UserType::where(['role_name'=>$req->get('user_type')])->firstOrFail();
            $u = new User();
            $u->email = $req->get('uemail');
            $u->password=bcrypt($req->get('upassword'));
            $u->is_active = 1;
            
            $role->users()->save($u);

            $user = User::orderBy('id', 'desc')->first();
            $type_of_user = $user->user_type_id;

            if($type_of_user==2)
            {
                $user->user_name = "Applicant";
                $user->profile_img = "applicant.png";
                $user->save();
                $profile = new ApplicantProfile();
                $user->applicant_profile()->save($profile);
            }
            elseif ($type_of_user==3)
            {
                $user->user_name = "Employer";
                $user->profile_img = "employer.png";
                $user->save();
                $profile = new EmployerProfile();
                $user->employer_profile()->save($profile);
            }



            session()->flash('message', "You are Successfully Register");
            return Redirect::back()->with('signup', "signup");
        }
    }

    public function login(Request $req)
    {
        $rules=array(
            'uemail'=>'required|email',
            'password'=>'required|min:6'
        );

        $message= array(
            'uemail.required'=>"Email is required",
            'uemail.email'=>"Email is not in correct formate",
            'password.required'=>"Password is Required",
            'password.min'=>"Password Must not be less then 6 Digits",

        );
        $validate = Validator::make($req->all(),$rules,$message);

        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors())->with('login',"login");
        }
        else
        {
            $email = $req->get('uemail');
            $password = $req->get('password');
            if(Auth::attempt(['email' =>  $email, 'password' => $password , "user_type_id"=> 2]))
            {

                return redirect()->route('check_user_role');

            }
            elseif(Auth::attempt(['email' =>  $email, 'password' => $password , "user_type_id"=> 3]))
            {

                return redirect()->route('check_user_role');

            }
            else
            {
                return redirect()->back()->with("msg","Email or Password is incorrect")->with('login','login');
            }
        }
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        if(!Auth::check())
        {
            return redirect()->route('home')->with('msg','You are logout')->with('login','login');
        }

    }
}
