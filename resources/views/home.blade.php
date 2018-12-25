@extends('Master_Layout.master')

@section('upperlinks')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('logo-top.ico')}}">
    <title>CareerPoint - Home Page</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap-3.3.7-dist/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/myCustomStyle.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/alag.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/table.css')  }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
                            @if(\Illuminate\Support\Facades\Auth::user()->user_type_id==2)
                                <li><a href="{{route('applicantProfile')}}" style="outline: none!important;">Go To DashBoard</a></li>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->user_type_id==3)
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
    <div>

        <div class="container" id="Main" role="main">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="search_area">
                    <div class="box">
                        <div class="col-md-12 nopadding">
                            <form action="{{route('viewsearchform')}}" method="get" role="form">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="jobTitle" id="jobTitle" autocomplete="off" placeholder="Looking for...">
                                        </div>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="form-group">
                                            <select id="type" name="jobType" class="form-control select2-multiple ss select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                <option value="Type" selected="">Job Type</option>
                                                @foreach($job_type as $jb)
                                                    <option value="{{$jb->id}}">{{$jb->job_type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 text-left nopadding">
                                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <div class="row bannerBtnSytle">
                                    <div class="col-xs-5 ">
                                        <a href="{{route('applicantProfile')}}" class="btn btn-primary BannerBtnPadding"><i class="glyphicon glyphicon-list-alt"></i> Post Resume     </a>
                                    </div>
                                    <div class="col-xs-5 ">
                                        <a href="{{ route('EmployerJob.create')}}" class="btn btn-info BannerBtnPadding"><i class="glyphicon glyphicon-gift"></i>Post Job</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{ asset('img/Main/main1.jpg') }}">
                    </div>
                    <div class="item ">
                        <img src="{{ asset('img/Main/main2.jpg') }}">
                    </div>
                    <div class="item ">
                        <img src="{{ asset('img/Main/main3.jpg') }}">
                    </div>
                    <div class="item ">
                        <img src="{{ asset('img/Main/main4.jpg') }}">
                    </div>
                    <div class="item ">
                        <img src="{{ asset('img/Main/main5.jpg') }}">
                    </div>
                </div>

                <div class="banner_title caption">
                    FIND A <span style="color: black">JOB</span> YOU WILL <span style="color: black">LOVE</span>
                    <div style="margin: 20% 40px 0px 0px;"><span style="font-weight: normal;font-size: 16px;" >
                            @if ($errors->any() && Session::has('seachform'))
                                <div>
                        @foreach ($errors->all() as $error)
                                        {{ $error }}
                                        <br />
                                    @endforeach
                    </div>
                            @endif
                                @if(session()->has('message'))
                                {{session()->get('message')}}
                            @endif</span></div>
                </div>
            </div>
            

            <div class="container">
                <div class="counting-container">
                    <div class="counting-box" id="encounter">
                        <img src="{{ asset('img/MiniBannerLogo/available.png') }}" alt="Posts">
                        <h4 class="count-this">{{$job_avail_count}}</h4>
                        <p>Available Jobs </p>
                    </div>
                    <div class="counting-box" id="battles">
                        <img src="{{ asset('img/MiniBannerLogo/post-it.png')}}" alt="Image 2">
                        <h4 class="count-this">{{ $job_count}}</h4>
                        <p>Jobs Posted</p>
                    </div>
                    <div class="counting-box" id="locations">
                        <img src="{{ asset('img/MiniBannerLogo/boss.png')}}" alt="Image 13">
                        <h4 class="count-this">
                            {{ $user_count }}
                        </h4>
                        <p>Registered Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table For Display Posts -->
    <table class="tableContainer table-responsive">
        <h4 class="heading">Trending this month</h4>
        <tbody>


        @foreach($jobs as $job)
                <tr>
                    <td><a href="{{route('viewjob',$job->id)}}">{{ $job->title }}</a></td>
                    <td><span class="glyphicon glyphicon-usd" title="Salary"></span> {{ $job->salary }}</td>
                    <td><span class="glyphicon glyphicon-tags" title="Job Type"></span> {{ $job->jobtype->job_type }}</td>
                    <td><span class="glyphicon glyphicon-map-marker" title="Location"></span>{{$job->joblocation->city->city_name}}</td>
                </tr>
        @endforeach

        <tr>
            <td colspan="4"><span class="pull-right"><form action="{{route('viewsearchform')}}" method="get">
                         <button type="submit" class="btn btn-primary">See More</button></form></span></td>
        </tr>
        </tbody>
    </table>
    <div class="jumbotron">
        <div class="container">
            <footer>
                            <span class="text-center">
                                <p class="footer_top_margin">&copy; 2018 Company, Inc.</p>
                            </span>
            </footer>
        </div>
    </div>




    <!-- Login Modal -->

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
                                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                    
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






    <!-- SignUp Modal -->

    <!-- Modal -->

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
                                        <input type="text" class="form-control" id="RegUsername" name="uemail" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="ruemail" class="control-label">Retype Email</label>
                                        <input type="text" class="form-control" id="retypeRegUsername" name="ruemail" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
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