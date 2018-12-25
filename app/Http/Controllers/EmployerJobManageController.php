<?php

namespace App\Http\Controllers;

use App\City;
use App\CompanyInfo;
use App\Country;
use App\Job;
use App\JobLocation;
use App\JobType;
use App\SkillSet;
use App\State;
use App\User;
use App\ZipCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class EmployerJobManageController extends Controller
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
        $user = Auth::user();
        $this->check_notification($user);

        //Check Message in Message Table
        $u = $user;


        $this->check_messages($u);
        $jobs = Job::whereUserId($user->id)->get();

        return view('Employer.ManageJobPost.viewjobpost')->with('jobs',$jobs)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids);
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

        //Check Message in Message Table
        $u = $user;


        $this->check_messages($u);
        $company = $user->employer_profile->company_info;
        if(count($company)>0)
        {
            $country = Country::all();
            $state = State::all();
            $city = City::all();
            $zip = ZipCode::all();
            $jobtype = JobType::all();
            $skills = SkillSet::all();
            return view('Employer.ManageJobPost.createjobpost')->with('country',$country)
                ->with('jobtypes',$jobtype)->with('state',$state)->with('city',$city)->with('zip',$zip)->with('company',$company)->with('skills',$skills)->with('shown',$this->shown)->with('total_message',$this->total_messages)
                ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids);

        }
        else
        {
            return redirect()->route('EmployerCompany.create')->with('shown',$this->shown)->with('total_message',$this->total_messages)
                ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \IlluminatJe\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=array(
            "title" => 'required',
            "description" => 'required|min:150,190',
            "salary" => 'required|numeric',
            "lad" => 'required|date',
            "jobtype" => 'required|not_in:0',
            "country" => 'required|not_in:0',
            "state" => 'required|not_in:0',
            "city" => 'required|not_in:0',
            "zip" => 'required|not_in:0',
            "com" => 'required|not_in:0',
            "address" => 'required',
            "skill_set" => 'required|array|min:1',
            "skill_level" => 'required|array|min:1',

            "skill_set.*"  => "required|integer",
            "skill_level.*"  => "required|integer",
        );


        $message= array(
            'lad.required' => "last apply date is required"
            );
        $validate = Validator::make($request->all(),$rules,$message);

        if($validate->fails())
        {
            
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {

        $loc = new JobLocation();
        $loc->address = $request->address;
        $loc->country_id = $request->country;
		$loc->state_id = $request->state;
		$loc->city_id = $request->city;
		$loc->zip_id = $request->zip;
		$loc->save();

        $loc = JobLocation::orderBy('id', 'desc')->first();

		$user = Auth::user();

        $job = new Job();
        $job->title=$request->get('title');
        $job->description=$request->get('description');
        $job->expire_job=$request->get('lad');
        $job->salary=$request->get('salary');
        $job->job_type_id=$request->get('jobtype');
        $job->job_location_id = $loc->id;
        $job->company_info_id=$request->get('com');

        $user->employer_job()->save($job);


        $job = Job::orderBy('id','desc')->first();

        for ($i=0; $i<count($request->get("skill_set"));$i++) {
            $job->job_post_skill_set()->attach($request->get("skill_set")[$i],['skill_level'=>$request->get("skill_level")[$i]]);
        }

        foreach ($job->job_post_skill_set as $k)
        {
            $user = User::all()->where('user_type_id','=',2);
            foreach ($user as $u)
            {

                foreach($u->applicant_profile->skill_set as $z)
                {
                    if($k->skill_name==$z->skill_name)
                    {
                        if(!count(\App\Notification::all()->where('user_id','=',$u->id)->where('post_job_id','=',$job->id))>0)

                        {

                            $noti = new \App\Notification();
                            $noti->post_job_id = $job->id;
                            $noti->user_id = $u->id;
                            $noti->notification_type_id = 1;
                            $noti->expiry_date = date('Y/m/d');
                            $noti->is_seen = 0;
                            $noti->save();
                        }

                    }
                }
            }

        }

        return redirect()->route('EmployerJob.index');
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
        $this->check_notification($user);

        //Check Message in Message Table
        $u = $user;


        $this->check_messages($u);
        $company = $user->employer_profile->company_info;
        $job = Job::findOrFail($id);
        $country = Country::all();
        $state = State::all();
        $city = City::all();
        $zip = ZipCode::all();
        $jobtype = JobType::all();
        $skills = SkillSet::all();
        return view('Employer.ManageJobPost.showspecificjob')->with('job',$job)->with('country',$country)
            ->with('jobtypes',$jobtype)->with('state',$state)->with('city',$city)->with('zip',$zip)->with('company',$company)->with('skills',$skills)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids);
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
        $this->check_notification($user);

        //Check Message in Message Table
        $u = $user;


        $this->check_messages($u);
        $company = $user->employer_profile->company_info;
        $job = Job::findOrFail($id);
        $country = Country::all();
        $state = State::all();
        $city = City::all();
        $zip = ZipCode::all();
        $jobtype = JobType::all();
        $skills = SkillSet::all();
        return view('Employer.ManageJobPost.updatejobpost')->with('job',$job)->with('country',$country)
            ->with('jobtypes',$jobtype)->with('state',$state)->with('city',$city)->with('zip',$zip)->with('company',$company)->with('skills',$skills)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids);
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
            "title" => 'required',
            "description" => 'required|min:150,190',
            "salary" => 'required|numeric',
            "lad" => 'required|date',
            "jobtype" => 'required|not_in:0',
            "country" => 'required|not_in:0',
            "state" => 'required|not_in:0',
            "city" => 'required|not_in:0',
            "zip" => 'required|not_in:0',
            "com" => 'required|not_in:0',
            "address" => 'required',
            "skill_set" => 'required|array|min:1',
            "skill_level" => 'required|array|min:1',

            "skill_set.*"  => "required|integer",
            "skill_level.*"  => "required|integer",
        );


        $message= array(
            'lad.required' => "last apply date is required"
            );
        $validate = Validator::make($request->all(),$rules,$message);

        if($validate->fails())
        {
            
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {
        $job = Job::findOrFail($id);

        $job->title=$request->get('title');
        $job->description=$request->get('description');
        $job->expire_job=$request->get('lad');
        $job->salary=$request->get('salary');
        $job->job_type_id=$request->get('jobtype');
        $job->job_location_id = $job->joblocation->id;
        $job->company_info_id=$request->get('com');

        $job->save();

        $job_loc = JobLocation::find(($job->job_location_id));

        $job_loc->country_id = $request->country;
        $job_loc->state_id = $request->state;
        $job_loc->city_id = $request->city;
        $job_loc->zip_id = $request->zip;
        $job_loc->address = $request->address;

        $job_loc->save();

        $job->job_post_skill_set()->detach();

        for ($i=0; $i<count($request->get("skill_set"));$i++) {
            $job->job_post_skill_set()->attach($request->get("skill_set")[$i],['skill_level'=>$request->get("skill_level")[$i]]);
        }

        return redirect()->route('EmployerJob.index');
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
        $job = Job::findOrFail($id);

        $job->delete();
        return redirect()->route('EmployerJob.index');

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

