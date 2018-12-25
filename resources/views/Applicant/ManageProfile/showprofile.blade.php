@extends('Applicant.ApplicantMasterLayout.master')


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
                    <a href="{{route('applicantProfile')}}" class="active">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-laptop"></i>
                        <span>Jobs</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><form action="{{route('viewsearchform')}}" method="get">
                                <button type="submit" class="btn btn-link"><a>Search Jobs</a></button></form></li>
                        <li><a href="{{ route('viewapplyjobs')}}">View Apply Jobs</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-book"></i>
                        <span>Education</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('ApplicantEducation.create')}}">Create Education Degree</a></li>
                        <li><a href="{{ route('ApplicantEducation.index') }}">View Education Degrees</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-cogs"></i>
                        <span>Experience</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block;">
                        <li><a href="{{ route('ApplicantExperience.create')}}">Create Experience Record</a></li>
                        <li><a href="{{ route('ApplicantExperience.index') }}">View Experience Record</a></li>

                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-star"></i>
                        <span>Skills</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('ApplicantSkill.create')}}">Create Skill Set</a></li>
                        <li><a href="{{ route('ApplicantSkill.index') }}">View Skill Set</a></li>
                    </ul>
                </li>
            </ul>
@endsection

@section('mainbody')
    <div class="bootstrap snippet">
        <h1 class="text-primary text-center"><span></span>View Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <div class="col-md-1" style="margin-left: -151px;">
                <div class="text-center">
                    <img src="{{asset('Images/profile')}}/{{$pro->user->profile_img}}" class="avatar img-circle" id="avatar" alt="avatar" width="100px" height="100px">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-11 personal-info">

                <h3 class="text-center">Personal info</h3>

                <form class="form-horizontal" role="form" action="{{route('editApplicantProfile')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="fname" id="fname" value="{{ $pro->first_name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">Last name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$pro->last_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">User name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$pro->user->user_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">Contact Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$pro->contact_number}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">Date of Birth:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$pro->dob}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">Gender:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$pro->gender->gender_type}}" readonly>
                        </div>
                    </div>
                    <div class="text-center form-group">
                        <label class="col-lg-2 col-lg-offset-2 control-label">Resume:</label>

                        <div class="col-lg-8">
                            <span class="form-control"><a href="{{asset('Images/resume')}}/{{$pro->user_resume}}">Download Resume</a></span>
                        </div>
                    </div>
                  
                    <div class="form-group">
    <div class="col-lg-2 col-lg-offset-4" style="
    margin-bottom: 10px;
">
        <button type="submit" class="form-control" >Edit</button>
    </div>
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
                                        @foreach($pro->education as $edu)
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
                                        @foreach($pro->experience as $ex)
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
                                    <table class="table table-hover ">
                                        <thead>
                                        <tr>
                                            <th>Skill</th>
                                            <th style="text-align: left;"> Skill Level</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($pro->skill_set as $s)
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
    </div>

@stop
