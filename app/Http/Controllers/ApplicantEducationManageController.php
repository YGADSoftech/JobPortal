<?php

namespace App\Http\Controllers;

use App\EducationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class ApplicantEducationManageController extends Controller
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
        $edus = $user->applicant_profile->education()->get();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Applicant.ManageEducation.vieweducationrecord')->with('edus',$edus)->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$this->no_right);
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
        return view('applicant.ManageEducation.createeducationrecord')->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
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
            'degree_name'=>'required|array|min:1',
            "degree_name.*"  => "required",
            'institute_name'=>'required|array|min:1',
            "institute_name.*"  => "required|string",
            'start_date'=>'required|array|min:1',
            "start_date.*"  => "required|date",
            'completion_date'=>'required|array|min:1',
            "completion_date.*"  => "required|date",
            'percentage'=>'required|array|min:1',
            "percentage.*"  => "required|numeric|between:1.00,100.00",
            'cgpa'=>'required|array|min:1',
            "cgpa.*"  => "required|numeric|between:1.00,4.00",
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
//

        for ($i=0; $i<count($request->get("degree_name"));$i++)
        {
            $applicant_education = new EducationDetail();
            $applicant_education->degree_name = $request->get("degree_name")[$i];
            $applicant_education->institute_name = $request->get("institute_name")[$i];
            $applicant_education->start_date = $request->get("start_date")[$i];
            $applicant_education->completion_date = $request->get("completion_date")[$i];
            $applicant_education->pencerntage = $request->get("percentage")[$i];
            $applicant_education->cgpa = $request->get("cgpa")[$i];

            $user->applicant_profile->education()->save($applicant_education);

        }
            return redirect()->route('ApplicantEducation.index');
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
        $user = Auth::user();
        $edu = EducationDetail::findOrFail($id);
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Applicant.ManageEducation.showspecificeducation')->with('edu',$edu)->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
        ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$this->no_right);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $edu = EducationDetail::findOrFail($id);
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Applicant.ManageEducation.updateeducationrecord')->with('edu',$edu)->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$this->no_right);
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
            "degree_name"  => "required",
            "institute_name"  => "required|string",
            "start_date"  => "required|date",
            "completion_date"  => "required|date",
            "percentage"  => "required|numeric|between:1.00,100.00",
            "cgpa"  => "required|numeric|between:1.00,4.00",
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
        $applicant_education = EducationDetail::findOrFail($id);
        $applicant_education->degree_name = $request->get("degree_name");
        $applicant_education->institute_name = $request->get("institute_name");
        $applicant_education->start_date = $request->get("start_date");
        $applicant_education->completion_date = $request->get("completion_date");
        $applicant_education->pencerntage = $request->get("percentage");
        $applicant_education->cgpa = $request->get("cgpa");


        $applicant_education->save();

        return redirect()->route('ApplicantEducation.index');
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
        $applicant_education = EducationDetail::findOrFail($id);

        $applicant_education->delete();
        return redirect()->route('ApplicantEducation.index');
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
