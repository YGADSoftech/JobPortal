@extends('Employer.EmployerMasterLayout.master')

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

    <div class="container bootstrap snippet text-center">
        <h1 class="text-primary"><span></span>View Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                    <img @if(\Illuminate\Support\Facades\Auth::user()->profile_img != null) src="{{asset('Images/profile')}}/{{$pro->user->profile_img}}"  @else src="//placehold.it/100" @endif  class="avatar img-circle" alt="avatar" width="100px" height="100px">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">

                <h3>Personal info</h3>

                <form class="form-horizontal" role="form" action="{{route('editEmployerProfile')}}" method="GET">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="fname" id="fname" value="{{ $pro->first_name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$pro->last_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">User name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$pro->user->user_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$pro->contact_number}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Date of Birth:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$pro->dob}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Gender:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" value="{{$pro->gender->gender_type}}" readonly>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>

@stop