<?php

namespace App\Http\Controllers;

use App\SkillSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class ApplicantSkillSetManageController extends Controller
{
    private $shown = false;
    private $total_messages = 0;
    private $user_data = array();
    private $time = array();
    private $ids = array();
    private $i = 0;
    private $no_right="";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Applicant.ManageSkills.viewskillrecord')->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$this->no_right);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = SkillSet::all();
        $user = Auth::user();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('applicant.ManageSkills.createskillrecord')->with('skills',$skills)->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$this->no_right);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=array(
            "skill_set"  => "required|array|min:1",
            "skill_level"  => "required|array|min:1",

            "skill_set.*"  => "required|integer",
            "skill_level.*"  => "required|integer",
        );


        $message= array(
           
            );

        $validate = Validator::make($request->all(),$rules,$message);

        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {
        $user = Auth::user();

        for ($i=0; $i<count($request->get("skill_set"));$i++) {
            foreach($user->applicant_profile->skill_set as $ss)
            {
                if($ss->pivot->skill_ser_id == $request->get("skill_set")[$i])
                {
                    return redirect()->back()->withErrors(['One or More Skill Set Already Present.']);
                }
            }
            $user->applicant_profile->skill_set()->attach($request->get("skill_set")[$i],['skill_level'=>$request->get("skill_level")[$i]]);
        }

        return redirect()->route('ApplicantSkill.index');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skills = SkillSet::all();
        $user = Auth::user();
        $arr = array();
        $this->check_notification($user);
        $this->check_messages($user);
        foreach ($user->applicant_profile->skill_set as $k)
        {
            if($k->pivot->id == $id) {
                $arr[0] = $k->skill_name;
                $arr[1] = $k->pivot->skill_level;
                $arr[2] = $id;
            }
        }

       return view('Applicant.ManageSkills.updateskillrecord')->with('skills',$skills)->with('arr',$arr)
           ->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
           ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$this->no_right);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=array(
            "skill_set"  => "required|integer",
            "skill_level"  => "required|integer",
        );


        $message= array(
           
            );

        $validate = Validator::make($request->all(),$rules,$message);

        if($validate->fails())
        {
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {
        $user = Auth::user();
        foreach ($user->applicant_profile->skill_set as $k)
        {
            if($k->pivot->id == $id) {
                $k->pivot->skill_ser_id = $request->get('skill_set');
                $k->pivot->skill_level = $request->get('skill_level');
                $k->pivot->save();
                break;
            }
        }
        return redirect()->route('ApplicantSkill.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();

        $user->applicant_profile->skill_set()->detach($id);
        return redirect()->route('ApplicantSkill.index');

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
