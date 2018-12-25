<?php

namespace App\Http\Controllers;

use App\Gender;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminManageAdminUsersController extends Controller
{



    private $shown = false;
    private $total_messages = 0;
    private $user_data = array();
    private $time = array();
    private $ids = array();
    private $i = 0;



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        $user = Auth::user();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Admin.ManageUsers.view')->with('users',$users)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Admin.ManageUsers.create')->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $u = new User();
        $u->email = $req->get('email');
        $u->password=bcrypt($req->get('pass'));
        $u->is_active = 1;
        $u->user_type_id = 1;
        $u->user_name = $req->get('uname');

        if ($f = $req->file('profile_img')) {
            $pro_name = (time() . '_' . $f->getClientOriginalName());
            $f->move('Images/profile', $pro_name);
        }
        $u->profile_img = $pro_name;
        $u->save();

        $last_user = User::orderBy('id', 'desc')->first();

        $profile = new \App\AdminProfile();
        
        $last_user->admin_profile()->save($profile);
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        $user = Auth::user();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Admin.ManageUsers.show')->with('users',$users)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = UserType::all();
        $users = User::findOrFail($id);
        $user = Auth::user();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Admin.ManageUsers.update')->with('users',$users)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('user',$user)->with('role',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $user = User::findOrFail($id);
        if($user->user_type_id == 1)
        {

        }
        else if($user->user_type_id == 2)
        {
            if($f = $req->file('profile_img'))
            {
                $old_image = 'Images/profile/'.$user->profile_img;
                File::delete($old_image);
                $pro_name = (time() . '_' .$f->getClientOriginalName());
                $f->move('Images/profile',$pro_name);
                $user->profile_img=$pro_name;

            }
            if($f = $req->file('resume'))
            {
                $old_resumee = 'Images/resume/'.$user->applicant_profile->user_resume;
                File::delete($old_resumee);
                $res_name = (time() . '_' .$f->getClientOriginalName());
                $f->move('Images/resume',$res_name);
                $user->applicant_profile->user_resume = $res_name;
            }

            $user->user_name = $req->get('uname');
            $user->save();

            $user->applicant_profile->first_name = $req->get('fname');
            $user->applicant_profile->last_name = $req->get('lname');
            $user->applicant_profile->contact_number = $req->get('cn');
            $user->applicant_profile->dob = $req->get('dob');
            $gender = Gender::where("gender_type","=",$req->get('gender'))->first();
            $gender->applicantprofile()->save($user->applicant_profile);
            $user->applicant_profile->save();
        }
        else if($user->user_type_id == 3)
        {

        }

        return redirect()->route('Users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
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
