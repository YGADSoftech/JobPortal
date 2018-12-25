@extends('Master_Layout.master')

@section('upperlinks')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>CareerPoint - Home Page</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap-3.3.7-dist/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/viewJobsPageStyling.css')}}">
    <link rel="stylesheet" href="{{ asset('css/myCustomStyle.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/alag.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/table.css')  }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        table{
            border-collapse: unset; 
        }
        <style>
        .fa-star {
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }
        .checked
        {
            color: orange;
        }
        .fa-star:hover{transform: rotate(-15deg) scale(1.3); }
        .maxColor{
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }
        .minColor
        {
            color: red;
        }
        textarea {
  resize: none;
}
    </style>

@stop

@section('navbar')


    <nav class="navbar navbar-findcond">
        <div class="container">
            <div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{route('home')}}"><img class="img img-responsive" src="{{ asset('img/logo.png') }}" alt="Logo"></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            @if(\Illuminate\Support\Facades\Auth::user()->user_type_id==1)
                                <li><a href="{{route('adminProfile')}}" style="outline: none!important;">Go To DashBoard</a></li>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->user_type_id==2)
                                <li><a href="{{route('applicantProfile')}}" style="outline: none!important;">Go To DashBoard</a></li>
                            @else
                                <li><a href="{{route('employerProfile')}}" style="outline: none!important;">Go To DashBoard</a></li>
                            @endif
                            <li class="signin"><a href="{{route('logout')}}" style="outline: none!important;">Logout</a></li>
                        @else
                            <li class="signin"><a href="#" data-toggle="modal" data-target="#myLoginModal" style="outline: none!important;">Login</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
@stop

@section('body')

 

    <!-- Basic Page Needs
================================================== -->

    <!-- Header / End --><style>
        table tr{
            background:none !important;
        }
        table td{text-align:left !important;}
        .alert-box {
            color:#555;
            border-radius:10px;
            font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
            padding:10px 36px;
            margin:10px;
        }
        .alert-box span {
            font-weight:bold;
            text-transform:uppercase;
        }
        .error {
            background:#ffecec url('../../../images/error.png') no-repeat 10px 50%;
            border:1px solid #f5aca6;
        }
    </style>
    <div class="header-page-title">
        <div class="container">
            <!--        <h1>--><!-- <small>, Pakistan</small></h1>-->
            <div class="title-bordered">
                <h2><span class="line line__left"></span><span class="line line__left"></span> {{ $job->title }} <span class="line line__right"></span><span class="line line__right"></span></h2><small>
                </small></div>
            <!--        <ul class="breadcrumbs">-->
            <!--            <li><a href="--><!--/new_recruit/">Home</a></li>-->
            <!--            <li><a href="--><!--/new_recruit/jobs">Jobs</a></li>-->
            <!--            <li>--><!--</li>-->
            <!--        </ul>-->
        </div>
    </div>
    <!-- end #header -->
    <div id="page-content">
        <div class="container">
            <div class="row white-container">
                <div class="col-sm-4 page-sidebar ">
                    <aside>
                        <div class="widget sidebar-widget white-container candidates-single-widget">
                            <div class="widget-content">
                                <input type="hidden" value="-" id="jobLatLong">
                                <input type="hidden" value="Professor of Nephrology" id="jobTitle">
                                <!--                            <div id="jobs-single-page-map" class="white-container"></div>-->

                                <h6 class="bottom-line heading_wizard_form">Job Details</h6>

                                <table>
                                    <tbody>
                                    <tr>
                                        <td>Salary</td>
                                        <td>{{$job->salary}} </td>
                                    </tr>

                                    <tr>
                                        <td>Job Type</td>
                                        <td>{{$job->jobtype->job_type}}</td>
                                    </tr>

                                    <tr>
                                        <td>Country</td>
                                        <td>{{$job->joblocation->country->country_name}}

                                    <tr>
                                        <td>City</td>
                                        <td>{{$job->joblocation->city->city_name}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                                
                            </div>
                        </div>
                    </aside>
                </div> <!-- end .page-sidebar -->

                <div class="col-sm-8 page-content">
                    <div class="clearfix mb30 hidden-xs">
                        <a href="{{route('viewsearchform')}}" class="btn btn-sm pull-left" style="background-color:#746EA9;" ><span style="color: white">Back to Listings</span></a>
                        <!--                    <div class="pull-right">
                                                <a href="#" class="btn btn-gray">Previous</a>
                                                <a href="#" class="btn btn-gray">Next</a>
                                            </div>-->
                    </div>

                     <div class="jobs-item jobs-single-item">
                        <div class="thumb"><img src="{{asset('img/hiring.jpg')}}" alt="We are Hiring"></div>
                        <div class="clearfix visible-xs"></div>
                        <div class="date">{{$job->expire_job->day}}<span>{{$job->expire_job->formatLocalized('%b')}}</span></div>
                        <h6 class="title"><a href="#"></a></h6>
                        <br>


                        <br><br>
                        <h6 class="bottom-line heading_wizard_form">Job Description</h6>
                        <p><textarea name="job" id="" cols="96" rows="10">{{$job->description}}</textarea></p>

                       



                        <h6 class="bottom-line heading_wizard_form">Company</h6>
                        <ul class="additional-requirements clearfix">
                        <table>
                                    <tbody>
                                    <tr>
                                        <td>Company Name</td>
                                        <td>{{$job->company->company_info}} </td>
                                    </tr>

                                    <tr>
                                        <td>Company Description</td>
                                        <td><textarea name="comapny" id="" cols="46" rows="10">{{$job->company->company_description}}</textarea> </td>
                                    </tr>

                                    <tr>
                                        <td>Established Date</td>
                                        <td>{{$job->company->established_date}}</td>
                                    </tr>

                                    <tr>
                                        <td>Company Address</td>
                                        <td>{{$job->company->address}}</td>
                                    </tr>

                                    <tr>
                                        <td>Company Website</td>
                                        <td><a href="http://{{$job->company->company_url}}">@php
                                                            $inipos = strpos($job->company->company_url,'.');
                                                            $url = str_replace_first('.',' ',$job->company->company_url);
                                                            $lastpos= (strpos($url,'.'));
                                                        @endphp
                                                        {{strtoupper(substr($url,$inipos+1,$lastpos-$inipos-1))}}</a>
                                        </td>
                                    </tr>
                                   
                                    </tbody>
                                </table>                      </ul>
                                <h6 class="bottom-line heading_wizard_form">Required Skills</h6>
                        <ul class="additional-requirements clearfix">
                        <table>
                                    <tbody>
                                    @foreach($job->job_post_skill_set as $s)
                                    <tr>
                                        <td>{{$s->skill_name}}</td>
                                        @if($s->pivot->skill_level==1)
                                        <td>               
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked minColor" name="1"></span>
                                                                <span class="fa fa-star  1" name="2"></span>
                                                                <span class="fa fa-star  1" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </td>
                                                    @elseif($s->pivot->skill_level==2)
                                                      <td> 
                                                            <span class="col-lg-9 "
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </td>
                                                    @elseif($s->pivot->skill_level==3)
                                                      <td> 
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </td>
                                                    @elseif($s->pivot->skill_level==4)
                                                      <td> 
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1 checked" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </td>
                                                    @elseif($s->pivot->skill_level==5)
                                                      <td> 
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1 checked" name="4"></span>
                                                                <span class="fa fa-star  1 checked maxColor" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </td>
                                                    @endif
                                    </tr>
                                    @endforeach
                                       


                                                                                  
                                   
                                    </tbody>
                                </table>                      </ul>




                        <div class="clearfix apply">
                            @if(\Illuminate\Support\Facades\Auth::check())
                        @if($job->expire_job > Carbon\Carbon::now())
                    
                            @if($apply)
                                    <form action="{{ route('unapp',['job_id'=>$job->id]) }}" method="post">
                                        {{csrf_field()}}
                                        <button type="submit" id="apply_btn" class="btn btn-primary pull-left applyButton" style="background-color:#746EA9;" ><span style="color: white">Un Apply</span></button>
                                    </form>
                                @else 
                                    @if(Illuminate\Support\Facades\Auth::user()->user_type_id==2)
                                    <form action="{{route('applyjob')}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$job->id}}">
                                        <button type="submit" id="apply_btn" class="btn btn-primary pull-left applyButton" style="background-color:#746EA9;" ><span style="color: white">Apply for this Job</span></button>
                                    </form>
                                @else
                                <h5>You have no right to Apply For Jobs</h5>
                                @endif @endif
                        @else
                            @if($apply)
                                <form action="#">
                                    <button id="apply_btn" class="btn btn-primary pull-left applyButton" style="background-color:#746EA9;" ><span style="color: white">Closed</span></button>
                                </form>
                            @else
                                @if(Illuminate\Support\Facades\Auth::user()->user_type_id==2)
                                <form action="#">
                                    {{ csrf_field() }}
                                    <button id="apply_btn" class="btn btn-primary pull-left applyButton" style="background-color:#746EA9;" ><span style="color: white">Closed</span></button>
                                </form>
                                @else
                                <h5>You have no right to Apply For Jobs</h5>
                                @endif
                            @endif
                        @endif
                           @else
                           <h5>Login Please</h5>
                           @endif

                            <ul class="social-icons pull-right">
                                

                                <li><a href="http://www.facebook.com" target="_blank" class="btn btn-gray fa fa-facebook"></a></li>
                                <li><a href="http://www.twitter.com" target="_blank" class="btn btn-gray fa fa-twitter"></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- <div class="title-lines">
                        <h3 class="mt0">About the Recruiter</h3>
                    </div>

                    <div class="about-candidate-item">
                        <div class="thumb"><img src="assets/frontend/img/content/face-9.png" alt=""></div>

                        <h6 class="title"><a href="#">John Doe</a></h6>
                        <span class="meta">24 Years Old - Sydney, AU</span>

                        <ul class="social-icons clearfix">
                            <li><a href="#" class="btn btn-gray fa fa-facebook"></a></li>
                            <li><a href="#" class="btn btn-gray fa fa-twitter"></a></li>
                            <li><a href="#" class="btn btn-gray fa fa-google-plus"></a></li>
                            <li><a href="#" class="btn btn-gray fa fa-dribbble"></a></li>
                            <li><a href="#" class="btn btn-gray fa fa-pinterest"></a></li>
                            <li><a href="#" class="btn btn-gray fa fa-linkedin"></a></li>
                        </ul>

                        <ul class="list-unstyled">
                            <li><strong>Tel:</strong> (123) 123-4567</li>
                            <li><strong>Website:</strong> <a href="#">example.com</a></li>
                        </ul>

                        <a href="#" class="btn btn-default">Send Message</a>
                    </div> -->
                </div> <!-- end .page-content -->
            </div>
        </div> <!-- end .container -->
    </div> <!-- end #page-content -->



    <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="signup">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
    </div>
    <div class="modal-body">
                    @if ($errors->any() && Session::has('signup'))
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }} </b>
                                  <br />
                                @endforeach
                        </div>
                    @endif
                    @if (Session::has('message'))
                            <div class="alert alert-info">
                                <div class="glyphicon glyphicon-ok">&nbsp</div><b>{{ Session::get('message') }}</b>
                            </div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well">
                                <form id="regForm" method="POST" action="{{ route('signUp') }}" novalidate="novalidate">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="uemail" class="control-label">Email</label>
                                        <input type="text" class="form-control" id="RegUsername" name="uemail" value="" required="" title="Please enter you email" placeholder="example@gmail.com">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="ruemail" class="control-label">Retype Email</label>
                                        <input type="text" class="form-control" id="retypeRegUsername" name="ruemail" value="" required="" title="Please reenter you email" placeholder="example@gmail.com">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="upassword" class="control-label">Password</label>
                                        <input type="password" class="form-control" id="regPassword" name="upassword" value="" required="" title="Please enter your password" placeholder="Enter 6+ Character Password">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="rupassword" class="control-label">Retype Password</label>
                                        <input type="password" class="form-control" id="retypeRegPassword" name="rupassword" value="" required="" title="Please enter your password" placeholder="Retype Your Password">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">User Type</label>
                                        <select class="form-control" name="user_type">
                                            <option value="a">Select User </option>
                                            <option value="Applicant">Applicant</option>
                                            <option value="Employer">Employer</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>


                                    <button type="submit" class="btn btn-success">Register</button>
                            <a href="#"   style="outline: none!important;" class="btn btn-success" id="RegToLogin">Login</a>

                                </form>
                            </div>
                        </div>
                        
                    </div>
        </div>


<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
    </div>
    </div>
    </div>





  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="myLoginModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                </div>
                <div class="modal-body">
                    @if ($errors->any() && Session::has('login'))
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }} </b>
                                <br />
                            @endforeach
                        </div>
                    @endif

                    @if (Session::has('msg'))
                            <div class="alert alert-danger">
                                <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ Session::get('msg') }}</b>
                            </div>
                    @endif
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well">
                                <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate="novalidate">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="uemail" class="control-label">Email</label>
                                        <input type="text" class="form-control" id="loginUsername" name="uemail" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label> 
                                        <input type="password" class="form-control" id="loginPassword" name="password" value="" required="" title="Please enter your password" placeholder="Enter Password"> 
                                        <span class="help-block"></span>
                                    </div>
                                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                                    
                                    <button type="submit" class="btn btn-success">Login</button>
                            <a href="#"   style="outline: none!important;" class="btn btn-success" id="loginToReg">Register</a>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
    </div>
  </div>
</div>

        </div>

@stop



@section('footerlinks')
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/JQuery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery-ui/jquery-ui.js') }}"></script>
    <!-- <script src="{{ asset('js/tests.js') }}"></script> -->
    <script src="{{ asset('js/counter.js') }}"></script>
    <script src="{{ asset('js/modelbtn.js') }}"></script>
    @if (Session::has('signup'))
        <script>
            $( document ).ready(function() {
                $('#signup').modal('show');
            });
        </script>
    @endif
    @if (Session::has('login'))
        <script>
            $( document ).ready(function() {
                $('#myLoginModal').modal('show');
            });
        </script>
    @endif

@stop