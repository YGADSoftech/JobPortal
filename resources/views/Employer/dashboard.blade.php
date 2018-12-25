@extends('Employer.EmployerMasterLayout.master')


@section('sidebar')
<ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{route('employerProfile')}}" class="active">
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
                    <i class="fa fa-building"></i>
                </div>
                <div class="value">
                    <h1 class=" count2">{{count($com)}}</h1>
                    <p>Company</p>
                </div>
            </section>
        </div>
        <div class="col-lg-6 col-sm-6">
            <section class="panel">
                <div class="symbol yellow">
                    <i class="fa fa-star"></i>
                </div>
                <div class="value">
                    <h1 class=" count3">{{count($tot_job_posted)}}</h1>
                    <p>Total Jobs</p>
                </div>
            </section>
        </div>
        <div class="col-lg-6 col-sm-6">
            <section class="panel">
                <div class="symbol blue">
                    <i class="fa fa-star-o"></i>
                </div>
                <div class="value">
                    <h1 class=" count4">{{count($user_jobs_posted)}}</h1>
                    <p>Your Jobs</p>
                </div>
            </section>
        </div>

       
    </div>

@stop
