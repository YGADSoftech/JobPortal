<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class EmployerCompanyManagementController extends Controller
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

        $companies = $user->employer_profile->company_info;
       return view('Employer.ManageCompany.viewcompany')->with('companies',$companies)->with('shown',$this->shown)->with('total_message',$this->total_messages)
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

        return view('Employer.ManageCompany.createcompany')->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids);

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
            "title" => 'required',
            "description" => 'required|min:150,190',
            "doe" => 'required|date',
            "add" => 'required',
            "url" => 'required|url',
        );


        $message= array(
            'doe.required' => "Date of Established is required",
            'doe.date' => "Date of Established is not in date formate",
            'add.required' => "Address is required",
            'url.required' => "Website is Requried",
            'url.url' => "Website is not in Right Formate",
            );
        $validate = Validator::make($request->all(),$rules,$message);

        if($validate->fails())
        {
            
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {
        $empId = Auth::user();
        $comInfo = new CompanyInfo();
        $comInfo->company_info = $request->get("title");
        $comInfo->company_description = $request->get("description");
        $comInfo->established_date = $request->get("doe");
        $comInfo->address = $request->get("add");
        $comInfo->company_url = $request->get("url");

        $empId->employer_profile->company_info()->save($comInfo);
        return redirect()->route('EmployerCompany.index');
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
        $company = CompanyInfo::findOrFail($id);
        return view('Employer.ManageCompany.showspecificcompany')->with('company',$company)->with('shown',$this->shown)->with('total_message',$this->total_messages)
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
        $company = CompanyInfo::findOrFail($id);

        return view('Employer.ManageCompany.updatecompany')->with('company',$company)->with('shown',$this->shown)->with('total_message',$this->total_messages)
            ->with('data',$this->user_data)->with('time',$this->time)->with('ids',$this->ids);;
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
            "doe" => 'required|date',
            "add" => 'required',
            "url" => 'required|url',
        );


        $message= array(
            'doe.required' => "Date of Established is required",
            'doe.date' => "Date of Established is not in date formate",
            'add.required' => "Address is required",
            'url.required' => "Website is Requried",
            'url.url' => "Website is not in Right Formate",
            );
        $validate = Validator::make($request->all(),$rules,$message);

        if($validate->fails())
        {
            
            return Redirect::back()->withErrors($validate->errors());
        }
        else
        {
        $comInfo = CompanyInfo::findOrFail($id);

        $comInfo->company_info = $request->get("title");
        $comInfo->company_description = $request->get("description");
        $comInfo->established_date = $request->get("doe");
        $comInfo->address = $request->get("add");
        $comInfo->company_url = $request->get("url");

        $comInfo->save();

        return redirect()->route('EmployerCompany.index');
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
        $company = CompanyInfo::findOrFail($id);

        $company->delete();
        return redirect()->route('EmployerCompany.index');
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
