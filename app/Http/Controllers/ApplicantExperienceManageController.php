<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\ExperienceDetail;
use App\State;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class ApplicantExperienceManageController extends Controller
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
        $expi = $user->applicant_profile->experience()->get();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Applicant.ManageExperience.viewexperiencerecord')->with('expi',$expi)->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
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
        $country = Country::all();
        $state = State::all();
        $city = City::all();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('applicant.ManageExperience.createexperiencerecord')->with('country',$country)->with('state',$state)->with('city',$city)->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids)->with('noRight',$this->no_right);
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
            "job_title"  => "required|array|min:1",
            "job_desc"  => "required|array|min:1",
            "comp_name"  => "required|array|min:1",
            "join_date"  => "required|array|min:1",
            "quit_date"  => "required|array|min:1",
            "is_job"  => "array|min:1",
            "country"  => "required|array|min:1",
            "state"  => "required|array|min:1",
            "city"  => "required|array|min:1",

            "job_title.*"  => "required",
            "job_desc.*"  => "required|min:150",
            "comp_name.*"  => "required|",
            "join_date.*"  => "required|date",
            "quit_date.*"  => "required|date",
            "country.*"  => "required||not_in:0",
            "state.*"  => "required||not_in:0",
            "city.*"  => "required||not_in:0",
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



        for ($i=0; $i<count($request->get("job_title"));$i++)
        {
            $applicant_experience = new ExperienceDetail();
            $applicant_experience->jon_tilte = $request->get("job_title")[$i];
            $applicant_experience->job_description = $request->get("job_desc")[$i];
            $applicant_experience->company_title = $request->get("comp_name")[$i];
            $applicant_experience->joining_date = $request->get("join_date")[$i];
            $applicant_experience->quit_date = $request->get("quit_date")[$i];
            if($request->get('is_job'))
            {
                $applicant_experience->is_job = 1;
            }
            else
            {
                $applicant_experience->is_job = 0;
            }

            $applicant_experience->job_location_country = $request->get("country")[$i];
            $applicant_experience->job_location_state =  $request->get("state")[$i];
            $applicant_experience->job_location_city = $request->get("city")[$i];

            $earlier = new DateTime($request->get("join_date")[$i]);
            $later = new DateTime($request->get("quit_date")[$i]);

            $applicant_experience->day_experience =  $later->diff($earlier)->format("%a");

            $user->applicant_profile->experience()->save($applicant_experience);
        }
        return redirect()->route('ApplicantExperience.index');
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
        $expi = ExperienceDetail::findOrFail($id);
        $country = Country::all();
        $state = State::all();
        $city = City::all();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Applicant.ManageExperience.showspecificexperience')->with('expi',$expi)->with('country',$country)->with('state',$state)->with('city',$city)->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
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
        $expi = ExperienceDetail::findOrFail($id);
        $country = Country::all();
        $state = State::all();
        $city = City::all();
        $this->check_notification($user);
        $this->check_messages($user);
        return view('Applicant.ManageExperience.updateexperiencerecord')->with('expi',$expi)->with('country',$country)->with('state',$state)->with('city',$city)->with("user",$user)->with('shown',$this->shown)->with('total_message',$this->total_messages)
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
            "job_title"  => "required",
            "job_description"  => "required|min:150",
            "company_title"  => "required|",
            "joining_date"  => "required|date",
            "quit_date"  => "required|date",
            "country"  => "required||not_in:0",
            "state"  => "required||not_in:0",
            "city"  => "required||not_in:0",
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
        $applicant_experience = ExperienceDetail::findOrFail($id);
        $applicant_experience->jon_tilte = $request->get("job_title");
        $applicant_experience->job_description = $request->get("job_description");
        $applicant_experience->company_title = $request->get("company_title");
        $applicant_experience->joining_date = $request->get("joining_date");
        $applicant_experience->quit_date = $request->get("quit_date");
        if($request->get('is_job'))
        {
            $applicant_experience->is_job = 1;
        }
        else
        {
            $applicant_experience->is_job = 0;
        }

        $applicant_experience->job_location_country = $request->get("country");
        $applicant_experience->job_location_state =  $request->get("state");
        $applicant_experience->job_location_city = $request->get("city");

        $earlier = new DateTime($request->get("joining_date"));
        $later = new DateTime($request->get("quit_date"));

        $applicant_experience->day_experience =  $later->diff($earlier)->format("%a");


        $applicant_experience->save();

        return redirect()->route('ApplicantExperience.index');
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
         ExperienceDetail::findOrFail($id)->delete();

        return redirect()->route('ApplicantExperience.index');
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
