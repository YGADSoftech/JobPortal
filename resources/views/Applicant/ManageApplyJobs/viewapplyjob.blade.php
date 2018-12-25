@extends('Applicant.ApplicantMasterLayout.master')


@section('styling')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('logo-top.ico')}}">
    <title>CareerPoint - Admin Dashboard</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->
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
                    <a href="javascript:;" class="dcjq-parent active">
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

    <!-- Page wrapper  -->
    <div class="page-wrapper" style="min-height: 542px;">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="align-self-center">
                <h3 class="text-primary text-center">View Jobs</h3></div>
        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover ">
                                    <thead>
                                    <tr>
                                        <th>Job Title</th>
                                        <th>Salary</th>
                                        <th>Company Name</th>
                                        <th>Location</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($u->apply_job as $ap)
                                        <tr>
                                            <th><a href="{{route('viewjob',$ap->id)}}">{{ $ap->title }}</a></th>
                                            <th>{{ $ap->salary }}</th>
                                            <th>{{ $ap->jobtype->job_type }}</th>
                                            <th>{{$ap->joblocation->city->city_name}}</th>

                                            <th>
                                                <div class="button-container">
                                                    <form action="{{ route('unapp',['job_id'=>$ap->id]) }}" method="post">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="fa fa-remove btn btn-danger" title="unapply"></button>
                                                    </form>
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>

            </div>









        </div>

    </div>
    <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->


@stop

