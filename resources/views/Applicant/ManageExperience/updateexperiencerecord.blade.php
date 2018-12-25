@extends('Applicant.ApplicantMasterLayout.master')


@section('styling')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/Admin/favicon.png')}}">
    <title>CareerPoint - Admin Dashboard</title>

 @stop

@section('sidebar')
<ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{route('applicantProfile')}}">
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
                    <a href="javascript:;" class="dcjq-parent active">
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

        <!-- Page wrapper  -->
        <div class="page-wrapper" style="min-height: 542px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="align-self-center">
                    <h3 class="text-primary text-center">Update Experience</h3> </div>

            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    @foreach ($errors->all() as $error)
                        <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }}</b>
                        <br />
                                    @endforeach

              
                    
                </div>
                @endif
                    <form class="form-horizontal" role="form" action="{{route('ApplicantExperience.update',$expi->id)}}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Job Name</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="job_title" placeholder="Job Name" id="job_title" value="{{ $expi->jon_tilte }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Job Description</label>
                            <div class="col-lg-8">
                                <textarea name="job_description" id="job_desctiption" placeholder="Minimum Character Must be 150" cols="30" rows="10" class="form-control">{{$expi->job_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Company Name</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="company_title" placeholder="Company Name" id="company_title" value="{{ $expi->company_title }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Joining Date</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date" name="joining_date" id="joining_date" value="{{ $expi->joining_date }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Quit Date</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date" name="quit_date" id="quit_date" value="{{ $expi->quit_date }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Is Job</label>
                            <div class="col-lg-2 col-lg-offset-2">
                                <input class="checkbox" type="checkbox" id="is_job" name="is_job" @if($expi->is_job==1) checked @endif>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Country </label>
                            <div class="col-lg-8">
                                <select name="country" id="country" class="form-control">
                                    <option value="{{$expi->job_location_country}}" readonly="">{{$expi->country->country_name}}</option>
                                    @foreach($country as $con)
                                        @if($con->id != $expi->job_location_country )
                                        <option value="{{$con->id}}">{{$con->country_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> State </label>
                            <div class="col-lg-8">
                                <select name="state" id="state" class="form-control">
                                    <option value="{{$expi->job_location_state}}">{{$expi->state->state_name}}</option>
                                    @foreach($state as $st)
                                        @if($st->id != $expi->job_location_state )
                                        <option value="{{$st->id}}">{{$st->state_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label"> City </label>
                            <div class="col-lg-8">
                                <select name="city" id="city" class="form-control">
                                    <option value="{{$expi->job_location_city}}">{{$expi->city->city_name}}</option>
                                    @foreach($city as $ct)
                                        @if($ct->id != $expi->job_location_city )
                                            <option value="{{$ct->id}}">{{$ct->city_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                        </div>
                    </form>


                </div>









            </div>
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->



@stop
