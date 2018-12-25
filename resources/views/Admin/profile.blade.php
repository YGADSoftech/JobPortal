@extends('Admin.AdminMasterLayout.master')

@section('sidebar')
<ul class="sidebar-menu" id="nav-accordion">

                <li>
                    <a href="{{route('adminProfile')}}" class="active">
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

    <div class="container bootstrap snippet text-center">
        <h1 class="text-primary"><span></span> Admin Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <form class="form-horizontal" role="form" action="{{ route('saveAdminProfile') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="col-md-3">
                <div class="text-center">
                    <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                    <h6>Upload a different photo...</h6>

                    <input type="file" class="form-control" name="profile_img">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">
               
                <h3>Personal info</h3>


                    <div class="form-group">
                        <label class="col-lg-3 control-label">First Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="fname" id="fname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="lname" id="lname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">User Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="uname" id="uname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="cn" id="cn">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Date of Birth:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type=date name="dob" id="dob">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Gender:</label>
                        <div class="col-lg-8">
                            <select name="gender" id="gender" class="form-control">
                                <option value="empty">Select Your Option</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4 ">
                            <button type="submit" class="btn btn-success btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>

@stop