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
                    <a href="javascript:;" class="dcjq-parent active">
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
        <h1 class="text-primary"><span></span>Edit Profile</h1>
        <hr>
        <div class="row">
            @if($users->user_type_id == 1)
                <form class="form-horizontal" role="form" action="{{route('Users.update',['id'=>$users->id])}}" method="POST"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('put')
                    <div class="col-md-3">
                        <div class="text-center">
                            <img @if(\Illuminate\Support\Facades\Auth::user()->profile_img != null) src="{{asset('Images/profile')}}/{{$users->profile_img}}"  @else src="//placehold.it/100" @endif  class="avatar img-circle" alt="avatar" width="100px" height="100px">

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
                                <input class="form-control" type="text" name="fname" id="fname" value="{{$users->admin_profile->first_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text"  name="lname" id="fname" value="{{$users->admin_profile->last_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">User Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="uname" id="uname" value="{{$users->user_name}}">
                                      </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Contact Number:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text"  name="cn" id="cn" value="{{$users->admin_profile->contact_number}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Date of Birth:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date"  name="dob" id="dob" value="{{$users->admin_profile->dob}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gender:</label>
                            <div class="col-lg-8">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="male" @if($users->admin_profile->gender->gender_type=="Male")selected @endif>Male</option>
                                    <option value="female" @if($users->admin_profile->gender->gender_type=="Female")selected @endif>Female</option>
                                </select>
                            </div>
                        </div>




                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            @elseif($users->user_type_id == 2)
                <form class="form-horizontal" role="form" action="{{route('Users.update',['id'=>$users->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="col-md-3">
                        <div class="text-center">
                            <img @if(\Illuminate\Support\Facades\Auth::user()->profile_img != null) src="{{asset('Images/profile')}}/{{$users->profile_img}}"  @else src="//placehold.it/100" @endif  class="avatar img-circle" alt="avatar" width="100px" height="100px">
                            <h6>Upload a different photo...</h6>

                            <input type="file" class="form-control" name="profile_img">
                        </div>
                    </div>

                    <!-- edit form column -->
                    <div class="col-md-9 personal-info">
                        
                        <h3>Personal info</h3>

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">First Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="fname" id="fname" value="{{$users->applicant_profile->first_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Last Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text"  name="lname" id="fname" value="{{$users->applicant_profile->last_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">User Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="uname" id="uname" value="{{$users->user_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Contact Number:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text"  name="cn" id="cn" value="{{$users->applicant_profile->contact_number}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Date of Birth:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date"  name="dob" id="dob" value="{{$users->applicant_profile->dob}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Gender:</label>
                            <div class="col-lg-8">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="male" @if($users->applicant_profile->gender->gender_type=="Male")selected @endif>Male</option>
                                    <option value="female" @if($users->applicant_profile->gender->gender_type=="Female")selected @endif>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-center form-group">
                            <label class="col-lg-2 control-label">Resume:</label>

                            <div class="col-lg-6">
                                <input type="file" class="form-control" name="resume">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-2 col-lg-offset-4">
                                <button type="submit" class="form-control" >Update</button>
                            </div>
                        </div>
                    </div>
                </form>

            @elseif($users->user_type_id == 3)
                <form class="form-horizontal" role="form" action="{{route('Users.update',['id'=>$users->id])}}" method="POST"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('put')

                    <div class="col-md-3">
                        <div class="text-center">
                            <img @if(\Illuminate\Support\Facades\Auth::user()->profile_img != null) src="{{asset('Images/profile')}}/{{$users->profile_img}}"  @else src="//placehold.it/100" @endif  class="avatar img-circle" alt="avatar" width="100px" height="100px">

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
                                <input class="form-control" type="text" name="fname" id="fname" value="{{$users->employer_profile->first_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text"  name="lname" id="fname" value="{{$users->employer_profile->last_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">User Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="uname" id="uname" value="{{$users->user_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Contact Number:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text"  name="cn" id="cn" value="{{$users->employer_profile->contact_number}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Date of Birth:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date"  name="dob" id="dob" value="{{$users->employer_profile->dob}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gender:</label>
                            <div class="col-lg-8">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="male" @if($users->employer_profile->gender->gender_type=="Male")selected @endif>Male</option>
                                    <option value="female" @if($users->employer_profile->gender->gender_type=="Female")selected @endif>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            @endif
        </div>
    </div>
    </div>
    <hr>

@stop