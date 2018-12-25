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
        <h1 class="text-primary"><span></span>Update Employer Profile</h1>
        <hr>
        <div class="row">
       
            <form class="form-horizontal" role="form" action="{{route('updateEmployerProfile')}}" method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="col-md-3">
                <div class="text-center">
                    <img @if(\Illuminate\Support\Facades\Auth::user()->profile_img != null) src="{{asset('Images/profile')}}/{{$pro->user->profile_img}}"  @else src="//placehold.it/100" @endif  class="avatar img-circle" alt="avatar" width="100px" height="100px" id="profile_img">

                    <h6>Upload a different photo...</h6>

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
                <h3>Personal info</h3>


                    <div class="form-group">
                        <label class="col-lg-3 control-label">First Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="fname" id="fname" placeholder="Ali" value="{{$pro->first_name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text"  name="lname" id="fname" placeholder="Amjad" value="{{$pro->last_name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">User Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="uname"  placeholder="8+ Letters" id="uname" value="{{$pro->user->user_name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contact Number:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" placeholder="123456789"  name="cn" id="cn" value="{{$pro->contact_number}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Date of Birth:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="date"  name="dob" id="dob" value="{{$pro->dob}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Gender:</label>
                        <div class="col-lg-8">
                            <select name="gender" id="gender" class="form-control">
                                <option value="male" @if($pro->gender->gender_type=="Male")selected @endif>Male</option>
                                <option value="female" @if($pro->gender->gender_type=="Female")selected @endif>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>

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