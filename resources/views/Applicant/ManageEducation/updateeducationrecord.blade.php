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

    <style>
        .button-container form,
        .button-container form div {
            display: inline;
        }

        .button-container button {
            display: inline;
            vertical-align: middle;
        }
    </style>

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
                    <a href="javascript:;" class="dcjq-parent active">
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

        <!-- Page wrapper  -->
        <div class="page-wrapper" style="min-height: 542px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="align-self-center">
                    <h3 class="text-primary text-center">Update Education</h3> </div>

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
                    <form class="form-horizontal" role="form" action="{{route('ApplicantEducation.update',$edu->id)}}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Degree Name</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" placeholder="Degree Name" name="degree_name" id="degree_name" value="{{ $edu->degree_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Institue Name</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" placeholder="Intitute Name" name="institute_name" id="institute_name" value="{{ $edu->institute_name }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Starting Date</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date" name="start_date" id="start_date" value="{{ $edu->start_date }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Competion Date Date</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date" name="completion_date" id="completion_date" value="{{ $edu->completion_date }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Pecerntage</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="number" placeholder="Percerntage" step="0.01" name="percentage" id="percentage" value="{{ $edu->pencerntage }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">CGPA</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="number" step="0.01" placeholder="cpga" name="cgpa" id="cgpa" value="{{ $edu->cgpa }}">
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



