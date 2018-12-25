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
                    <h3 class="text-primary text-center">View Education</h3> </div>

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
                                            <th>#</th>
                                            <th>Degree Name</th>
                                            <th>Institue Name</th>
                                            <th>Starting Date</th>
                                            <th>Competion Date</th>
                                            <th>Percentage</th>
                                            <th style="text-align: left;">CGPA</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($edus as $edu)
                                            <tr>
                                                <th>{{ $edu->id }}</th>
                                                <th>{{ $edu->degree_name }}</th>
                                                <th>{{ $edu->institute_name }}</th>
                                                <th>{{ $edu->start_date }}</th>
                                                <th>{{ $edu->completion_date }}</th>
                                                <th>{{ $edu->pencerntage }}</th>
                                                <th>{{ $edu->cgpa }}</th>

                                                <th>
                                                    <div class="button-container">
                                                        <form action="{{ route('ApplicantEducation.show',$edu->id) }}" method="GET">
                                                            <div>
                                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" title="View"></span></button>
                                                            </div>
                                                        </form>
                                                        <form action="{{ route('ApplicantEducation.edit',$edu->id) }}" method="get">
                                                            <div>
                                                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit" title="Edit"></span></button>
                                                            </div>
                                                        </form>
                                                        <form action="{{ route("ApplicantEducation.destroy" ,$edu->id) }}" method="POST">
                                                            <div>
                                                                {{ method_field('DELETE') }}
                                                                {{csrf_field()}}
                                                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" title="Delete"></span></button>
                                                            </div>
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



