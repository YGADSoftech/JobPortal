@extends('Admin.AdminMasterLayout.master')

@section('styling')
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
@endsection

@section('sidebar')
<ul class="sidebar-menu" id="nav-accordion">

                <li>
                    <a href="{{route('adminProfile')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-users-cog"></i>
                        <span>Users</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{route('Users.index')}}">View Users</a></li>
                        <li><a href="{{ route('Users.create')}}">Create Users</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-user-tag"></i>
                        <span>Roles</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{route('Roles.index')}}">View Role</a></li>
                    </ul>
                </li>

                
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-male"></i>
                        <span>Genders</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{route('Genders.index')}}">View Gender</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-globe-asia"></i>
                        <span>Countries</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{route('Countries.index')}}">View Country</a></li>
                        <li><a href="{{route('Countries.create')}}">Create Country</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-globe"></i>
                        <span>States</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{route('States.index')}}">View State</a></li>
                        <li><a href="{{route('States.create')}}">Create State</a></li>
                    </ul>
                </li>

                 <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-city"></i>
                        <span>City</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{route('Cities.index')}}">View City</a></li>
                        <li><a href="{{route('Cities.create')}}">Create City</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-plane"></i>
                        <span>ZipCodes</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{route('ZipCodes.index')}}">View Zip Codes</a></li>
                        <li><a href="{{route('ZipCodes.create')}}">Create Zip Codes</a></li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-star"></i>
                        <span>Skills</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('SkillSet.create')}}">Create Skill Set</a></li>
                        <li><a href="{{ route('SkillSet.index') }}">View Skill Set</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fa fa-tasks"></i>
                        <span>Job Types</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('JobType.create')}}">Create Job Type </a></li>
                        <li><a href="{{ route('JobType.index') }}">View Job Type </a></li>
                    </ul>
                </li>

                 <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-award"></i>
                        <span>Applicant Experience</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('Experience.index') }}">View Experience </a></li>
                    </ul>
                </li>


                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent active">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Applicant Education</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('Education.index') }}">View Education </a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-stamp"></i>
                        <span>Posted Job</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('Job.index') }}">View Posted Job </a></li>
                    </ul>
                </li>
               
               
            </ul>
@endsection

@section('mainbody')

    <!-- Main wrapper  -->
    <div id="main-wrapper" class="active">

        <div class="page-wrapper" style="min-height: 542px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="align-self-center">
                    <h3 class="text-primary text-center">View Applicant Education</h3> </div>

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
                                    <table class="table table-hover " Border = "1" Cellpadding = "5" Cellspacing = "5">
                                   
                                    <tr> 
                                    <th Colspan = "7" class = "text-center">Applicant Education</th> 
                                    </tr>
                                    
                                    <tr>
                                    <th >Applicant</th><th>Degree Name</th><th>Institue Name</th><th>Starting</th><th>Ending</th><th>Percentage</th><th>CPGA</th>
                                    </tr>
                                    
                                    
                                        @foreach($applicants as $app)
                                            @foreach($app->applicant_profile->education  as $ed)
                                        <tr>
                                        
                                        <td><a href="{{route('Users.show',$ed->appli_profile->user->id)}}">{{$ed->appli_profile->user->user_name}}</a></td><td>{{$ed->degree_name}}</td>
                                        <td>{{$ed->institute_name	}}</td><td>{{$ed->start_date}}</td><td>{{$ed->completion_date}}</td>
                                        <td>{{$ed->pencerntage}}</td><td>{{$ed->cgpa}}</td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                   

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

@endsection