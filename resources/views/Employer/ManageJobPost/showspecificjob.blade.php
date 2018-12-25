@extends('Employer.EmployerMasterLayout.master')


@section('sidebar')
<ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{route('employerProfile')}}">
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
                    <a href="javascript:;" class="dcjq-parent active">
                        <i class="fa fa-book"></i>
                        <span>Manage Job Posts</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('EmployerJob.create')}}">Create Job Post</a></li>
                        <li><a href="{{ route('EmployerJob.index') }}">View Job Post</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent ">
                        <i class="fa fa-cogs"></i>
                        <span>Manage Applicants</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block;">
                        <li><a href="{{ route('viewapplyapplicants')}}">View Applied Applicants</a></li>
                    </ul>
                </li>
            </ul>
@endsection


@section('styling')

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
        .panel-default > .panel-heading
        {
            background-color: #f1f2f7;
        }
        .panel
        {
            background-color: #f1f2f7;
        }
    </style>

@stop



@section('mainbody')
    <div id="main-wrapper" class="active">

        <!-- Page wrapper  -->
        <div class="page-wrapper" style="min-height: 542px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="align-self-center">
                    <h3 class="text-primary text-center">View Job Post</h3> </div>

            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                    <form class="form-horizontal" role="form" action="{{route('EmployerJob.index')}}" method="GEt">

                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Job Title</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="title" id="title" value="{{$job->title}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Description</label>
                            <div class="col-lg-8">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" readonly>{{$job->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Job Salary</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="salary" id="salary" value="{{$job->salary}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last Apply Date</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date" name="lad" id="lad" value="{{$job->expire_job}}" readonly>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Job Type:</label>
                            <div class="col-lg-8">
                                <select name="jobtype" id="jobtype" class="form-control" readonly>
                                    @foreach($jobtypes as $jobType)
                                        @if($jobType->id == $job->job_type_id)
                                            <option value="{{ $jobType->id  }}" selected>{{$jobType->job_type}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Country </label>
                            <div class="col-lg-8">
                                <select name="country" id="country" class="form-control" readonly>
                                    @foreach($country as $con)
                                        @if($con->id == $job->joblocation->country->id)
                                            <option value="{{ $con->id  }}" selected>{{$con->country_name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> State </label>
                            <div class="col-lg-8">
                                <select name="state" id="state" class="form-control" readonly>
                                    @foreach($state as $st)
                                        @if($st->id == $job->joblocation->state->id)
                                            <option value="{{ $st->id  }}" selected>{{$st->state_name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> City </label>
                            <div class="col-lg-8">
                                <select name="city" id="city" class="form-control" readonly>
                                    @foreach($city as $ci)
                                        @if($ci->id == $job->joblocation->city->id)
                                            <option value="{{ $ci->id  }}" selected>{{$ci->city_name}}</option>
                                                                              @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Zip Code </label>
                            <div class="col-lg-8">
                                <select name="zip" id="zip" class="form-control" readonly>
                                    <option value="empty">Zip Code</option>
                                    @foreach($zip as $zi)
                                        @if($zi->id == $job->joblocation->zip->id)
                                            <option value="{{ $zi->id  }}" selected>{{$zi->zip_code}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Company </label>
                            <div class="col-lg-8">
                                <select name="com" id="com" class="form-control" readonly>
                                    @foreach($company as $cam)
                                        @if($cam->id == $job->company->id)
                                            <option value="{{ $cam->id  }}" selected>{{$cam->company_info}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Adrees</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="address" id="address" value="{{$job->joblocation->address}}" readonly>
                            </div>
                        </div>

                        @php

                            $skill_name = array();
                            $skill_level = array();


                            foreach ($job->job_post_skill_set as $k)
                            {
                                array_push($skill_name,$k->skill_name);
                                array_push($skill_level,$k->pivot->skill_level);
                            }


                        @endphp
                        <div class="panel-group form-group" id="accordion">
                            @while(count($skill_name) > 0)
                                @if(count($skill_name)==1)

                                    <div class="panel panel-default template">
                                        <div class="panel-heading">
                                            <h4 class="panel-title" id="addCross">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Required Skills</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">

                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label"> Skill Name</label>
                                                    <div class="col-lg-8">



                                                        <select name="skill_set[]" id="skill_set[]" class="form-control" readonly>
                                                            @foreach($skill_name as $k)
                                                                @foreach($skills as $skill)
                                                                    @if($skill->skill_name == $k)
                                                                        <option value="{{ $skill->id  }}" selected>{{$skill->skill_name}}</option>
                                                                    @endif
                                                                @endforeach
                                                                @break
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label"> Skill Ratio</label>
                                                    <span class="col-lg-9 ">
                                                @foreach($skill_level as $k)
                                                            @if($k == 1)
                                                                <span class="fa fa-star  1 minColor checked" name="1"></span>
                                                                <span class="fa fa-star  1" name="2"></span>
                                                                <span class="fa fa-star  1" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                            @elseif($k == 2)
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                            @elseif($k == 3)
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                            @elseif($k == 4)
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1 checked" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                            @elseif($k == 5)
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1 checked" name="4"></span>
                                                                <span class="fa fa-star  1 checked maxColor" name="5"></span>
                                                            @endif
                                                        @endforeach

                                                        <input type="hidden" name="skill_level[]" id="skill_level[]" value="{{$k}}">
                                        </span>
                                                </div>




                                            </div>
                                        </div>
                                    </div>

                                @else

                                    <div class="panel panel-default template">
                                        <div class="panel-heading">
                                            <h4 class="panel-title" id="addCross">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#2">Required Skills</a>
                                                <span aria-hidden="true" id="remove" style="cursor: pointer;" class="glyphicon glyphicon-remove pull-right" onclick="{this.parentElement.parentElement.parentElement.remove();}"></span></h4>
                                        </div>
                                        <div id="2" class="panel-collapse collapse in">
                                            <div class="panel-body">

                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label"> Skill Name</label>
                                                    <div class="col-lg-8">



                                                        <select name="skill_set[]" id="skill_set[]" class="form-control" readonly>
                                                            @foreach($skill_name as $k)
                                                                @foreach($skills as $skill)
                                                                    @if($skill->skill_name == $k)
                                                                        <option value="{{ $skill->id  }}" selected>{{$skill->skill_name}}</option>
                                                                  @endif

                                                                @endforeach

                                                                @break
                                                            @endforeach

                                                        </select>


                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label"> Skill Ratio</label>
                                                    <span class="col-lg-9 ">
                                             @foreach($skill_level as $k)
                                                            @if($k == 1)
                                                                <span class="fa fa-star  1 minColor checked" name="1" ></span>
                                                                <span class="fa fa-star  1" name="2" ></span>
                                                                <span class="fa fa-star  1" name="3" ></span>
                                                                <span class="fa fa-star  1" name="4" ></span>
                                                                <span class="fa fa-star  1" name="5" ></span>
                                                            @elseif($k == 2)
                                                                <span class="fa fa-star  1 checked" name="1" ></span>
                                                                <span class="fa fa-star  1 checked" name="2" ></span>
                                                                <span class="fa fa-star  1" name="3" ></span>
                                                                <span class="fa fa-star  1" name="4" ></span>
                                                                <span class="fa fa-star  1" name="5" ></span>
                                                            @elseif($k == 3)
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3" ></span>
                                                                <span class="fa fa-star  1" name="4" ></span>
                                                                <span class="fa fa-star  1" name="5" ></span>
                                                            @elseif($k == 4)
                                                                <span class="fa fa-star  1 checked" name="1" ></span>
                                                                <span class="fa fa-star  1 checked" name="2" ></span>
                                                                <span class="fa fa-star  1 checked" name="3" ></span>
                                                                <span class="fa fa-star  1 checked" name="4" ></span>
                                                                <span class="fa fa-star  1" name="5" ></span>
                                                            @elseif($k == 5)
                                                                <span class="fa fa-star  1 checked" name="1" ></span>
                                                                <span class="fa fa-star  1 checked" name="2" ></span>
                                                                <span class="fa fa-star  1 checked" name="3" ></span>
                                                                <span class="fa fa-star  1 checked" name="4" ></span>
                                                                <span class="fa fa-star  1 checked maxColor" name="5" ></span>
                                                            @endif
                                                            <input type="hidden" name="skill_level[]" id="skill_level[]" value="{{$k}}">

                                                            @break
                                                        @endforeach
                                        </span>
                                                </div>




                                            </div>
                                        </div>
                                    </div>


                                @endif
                                @php
                                    $skill_name = array_reverse($skill_name);

  array_pop($skill_name) ;
  $skill_name = array_reverse($skill_name);

  $skill_level = array_reverse($skill_level);
  array_pop($skill_level);
  $skill_level = array_reverse($skill_level);

                                @endphp
                            @endwhile
                        </div>


                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Back</button>
                        </div>
                    </form>


                </div>








            </div>


        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->



@stop

