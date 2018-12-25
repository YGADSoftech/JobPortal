@extends('Employer.EmployerMasterLayout.master')


@section('styling')
    <style type="text/css">
        @media only screen and (min-width: 992px) {
            #avatar {
                margin-top: -60px;
                margin-left: 215px;
            }
        }
    </style>
     <style>
        .fa-star {
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }
        .checked
        {
            color: orange;
        }
        .fa-star:hover{transform: rotate(-15deg) scale(1.3); }
        .maxColor{
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }
        .minColor
        {
            color: red;
        }
    </style>
@stop

@section('sidebar')
<ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{route('employerProfile')}}" >
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-building"></i>
                        <span>Manage Company</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('EmployerCompany.create')}}">Create a Company</a></li>
                        <li><a href="{{ route('EmployerCompany.index') }}">View Company</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-book"></i>
                        <span>Manage Job Posts</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('EmployerJob.create')}}">Create Job Post</a></li>
                        <li><a href="{{ route('EmployerJob.index') }}">View Job Post</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent active">
                        <i class="fa fa-cogs"></i>
                        <span>Manage Applicants</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block;">
                        <li><a href="{{ route('viewapplyapplicants')}}">View Applied Applicants</a></li>
                    </ul>
                </li>
            </ul>
@endsection
@section('mainbody')

    <div class="bootstrap snippet">
        <h1 class="text-primary text-center"><span class="glyphicon glyphicon-user"></span> Applicant Information</h1>
        <div class="text-center">
            <form action="{{route("showmessagebox",['id'=>$id])}}" method="get">
                <button type="submit" class="btn btn-lg btn-success ">Message Me</button>
            </form> </div>

        <hr>
        <div class="row">
            <!-- left column -->
            <div class="col-md-1">
                <div class="text-center">
                    <img src="{{asset('Images/profile')}}/{{$user->profile_img}}" class="avatar img-circle" id="avatar" alt="avatar" width="100px" height="100px">
                </div>


            </div>

            <!-- edit form column -->
            <div class="col-md-12 personal-info">

                <h3 class="text-center">Personal info</h3>

                <form class="form-horizontal" role="form" >
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="fname" id="fname" value="{{ $user->applicant_profile->first_name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">Last name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$user->applicant_profile->last_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">User name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$user->user_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">Contact Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$user->applicant_profile->contact_number}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">Date of Birth:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$user->applicant_profile->dob}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">Gender:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$user->applicant_profile->gender->gender_type}}" readonly>
                        </div>
                    </div>
                    <div class="text-center form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">Resume:</label>

                        <div class="col-lg-8">
                            <span class="form-control"><a href="{{asset('Images/resume')}}/{{$user->applicant_profile->user_resume}}">Download Resume</a></span>
                        </div>
                    </div>

 <div class="col-md-12 personal-info">

<h3 class="text-center">Education</h3>

<div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                        <tr>
                                            <th>Degree Name</th>
                                            <th> Institue Name</th>
                                            <th> Starting Date </th>
                                            <th> Competion Date</th>
                                            <th> Percentage</th>
                                            <th> CGPA</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->applicant_profile->education as $edu)
                                            <tr>
                                                <th>{{ $edu->degree_name }}</th>
                                                <th>{{ $edu->institute_name }}</th>
                                                <th>{{ $edu->start_date }}</th>
                                                <th>{{ $edu->completion_date }}</th>
                                                <th>{{ $edu->pencerntage }}</th>
                                                <th>{{ $edu->cgpa }}</th>
                                                </tr>
                                        @endforeach
                                       
                                        </tbody>
                                    </table>
                                </div>

</div>

 <div class="col-md-12 personal-info">

<h3 class="text-center">Experience</h3>

<div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                        <tr>
                                            <th>Job Title</th>
                                            <th>Currently Jobing</th>
                                            <th>Joining Date</th>
                                            <th>Quit Date</th>
                                            <th style="text-align: left;">Job Experience(Days)</th></tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->applicant_profile->experience as $ex)
                                            <tr>
                                                <th>{{ $ex->jon_tilte }}</th>
                                                <th>@if($ex->is_job==1){{ "Yes" }} @else {{"No"}} @endif</th>
                                                <th>{{ $ex->joining_date }}</th>
                                                <th>{{ $ex->quit_date }}</th>
                                                <th>{{ $ex->day_experience }}</th>
                                                </tr>
                                        @endforeach
                                       
                                        </tbody>
                                    </table>
                                </div>

</div>

 <div class="col-md-12 personal-info">

<h3 class="text-center">Skills</h3>

<div class="table-responsive">
                                    <table class="table table-hover" style="overflow: hidden;">
                                        <thead>
                                        <tr>
                                            <th>Skill</th>
                                            <th style="text-align: left;"> Skill Level</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($user->applicant_profile->skill_set as $s)
                                            <tr>
                                                <th>{{$s->skill_name}}</th>
                                                <th>@if($s->pivot->skill_level==1)
                                                        <div class="form-group">
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked minColor" name="1"></span>
                                                                <span class="fa fa-star  1" name="2"></span>
                                                                <span class="fa fa-star  1" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </div>
                                                    @elseif($s->pivot->skill_level==2)
                                                        <div class="form-group">
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </div>
                                                    @elseif($s->pivot->skill_level==3)
                                                        <div class="form-group">
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </div>
                                                    @elseif($s->pivot->skill_level==4)
                                                        <div class="form-group">
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1 checked" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </div>
                                                    @elseif($s->pivot->skill_level==5)
                                                        <div class="form-group">
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1 checked" name="4"></span>
                                                                <span class="fa fa-star  1 checked maxColor" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </div>
                                                    @endif
                                                </th>

                                              
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                </form>
            </div>
        </div>
    </div>

@stop