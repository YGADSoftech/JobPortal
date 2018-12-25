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

    <div class="bootstrap snippet">
        <h1 class="text-primary text-center"><span></span>Applicant Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <form class="form-horizontal" role="form" action="{{route('saveApplicantProfile')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

            <div class="col-md-3">
                <div class="text-center">
                    <img src="//placehold.it/100" class="avatar img-circle" alt="avatar" id="profile_img">
                    <h6>Upload a profile photo...</h6>

                    <input type="file" class="form-control" id="profile_btn" name="profile_img">
                </div>
            </div>


            <!-- edit form column -->
            <div class="col-md-9 personal-info">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    @foreach ($errors->all() as $error)
                        <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }}</b>
                        <br />
                                    @endforeach

              
                    
                </div>
                @endif
                <h3 class="text-center">Personal info</h3>


                    <div class="form-group">
                        <label class="col-lg-3 control-label">First name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="fname" id="fname" placeholder="Rana Abdul" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" placeholder="Majeed" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">User Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="uname" id="uname" palceholder="8+ Letter" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="cn" id="cn" placeholder="+92 3243434344" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Date of Birth:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type=date name="dob" id="dob" placeholder="DD/MM/YYYY" require>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Gender:</label>
                        <div class="col-lg-8">
                            <select name="gender" id="gender" class="form-control">
                                <option value="0">Select Your Option</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center form-group">
                        <label class="col-lg-3 control-label">Resume:</label>

                        <div class="col-lg-8">
                            <input type="file" class="form-control" name="resume">
                        </div>
                    </div>
                <div class="form-group">
                    <div class="col-lg-2 col-lg-offset-4">
                        <button type="submit" class="form-control" >Create</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    @stop
    @section('footerScripts')
    <script !src="">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];
                    if ($.inArray(input.files[0]['type'], ValidImageTypes) < 0) {
                        // invalid file type code goes here.
                        $('#profile_img').attr('src','//placehold.it/100');
                        $('#profile_btn').val(null);
                        $('#showError').html("Input File is not a image file");
                    }
                    else
                    {
                        $('#profile_img').attr('src', e.target.result);
                        $('#profile_img').width(100);
                        $('#profile_img').height(100);
                        $('#showError').html("");
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile_btn").change(function() {
            readURL(this);
        });
    </script>
@stop
