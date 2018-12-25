@extends('Admin.AdminMasterLayout.master')

@section('styling')
    <style type="text/css">
        @media only screen and (min-width: 992px) {
            #avatar {
                margin-top: -60px;
                margin-left: 215px;
            }
        }
    </style>
@stop

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
                    <a href="javascript:;" class="dcjq-parent">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Applicant Education</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('Education.index') }}">View Education </a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent active">
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

    <div class="container bootstrap snippet text-center">
        <h1 class="text-primary"><span></span> Create Job Type</h1>
        <hr>
        <div class="row">
        <form class="form-horizontal" role="form" action="{{route('JobType.store')}}" method="POST">
                    {{ csrf_field() }}

                    <!-- edit form column -->
                    <div class="col-md-9 personal-info">
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a>
                            <i class="fa fa-coffee"></i>
                            This is an <strong>.alert</strong>. Use this to show important messages to the user.
                        </div>


                            
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Job Type</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="jobtype" id="jobtype">
                            </div>
                        </div>
                      

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Create</button>
                        </div>
                    </div>
                </form>

           
        </div>
    </div>
    </div>
    <hr>

@stop