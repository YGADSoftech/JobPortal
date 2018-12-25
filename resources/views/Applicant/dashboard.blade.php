@extends('Applicant.ApplicantMasterLayout.master')


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
                    <a href="javascript:;" class="dcjq-parent ">
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
    <div class="row state-overview">
        <div class="col-lg-6 col-sm-6">
            <section class="panel">
                <div class="symbol terques">
                    <i class="fa fa-user"></i>
                </div>
                <div class="value">
                    <h1 class="count">{{count($tot_user)}}</h1>
                    <p>Users</p>
                </div>
            </section>
        </div>
        <div class="col-lg-6 col-sm-6">
            <section class="panel">
                <div class="symbol red">
                    <i class="fa fa-tags"></i>
                </div>
                <div class="value">
                    <h1 class=" count2">{{count($company)}}</h1>
                    <p>Company</p>
                </div>
            </section>
        </div>
        <div class="col-lg-6 col-sm-6">
            <section class="panel">
                <div class="symbol yellow">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="value">
                    <h1 class=" count3">{{count($total_job_posted)}}</h1>
                    <p>Total Jobs</p>
                </div>
            </section>
        </div>
        <div class="col-lg-6 col-sm-6">
            <section class="panel">
                <div class="symbol blue">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value">
                    <h1 class=" count4">{{count($user_jobs_applied)}}</h1>
                    <p>Applied Jobs</p>
                </div>
            </section>
        </div>

    </div>

@stop
