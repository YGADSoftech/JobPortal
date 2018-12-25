@extends('Master_Layout.master')






@section('body_class')
    "fix-header fix-sidebar mini-sidebar"
@stop

@section('upperlinks')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('top-logo.png')}}">
    <title>CareerPoint - Job Portal System</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap-3.3.7-dist/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">


    
     <link rel="stylesheet" href="{{asset('css/viewJobsPageStyling.css')}}">
     <link rel="stylesheet" href="{{ asset('css/myCustomStyle.css')  }}"> 
     <link rel="stylesheet" href="{{ asset('css/alag.css')  }}"> 
    <link rel="stylesheet" href="{{ asset('css/table.css')  }}">
    
    

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



    <div class="header-page-title">
        <div class="container">
            <div class="title-bordered">
                <h2>
                    Available Jobs
                </h2>
            </div>
        </div>
    </div>
    <!-- end #header -->

    <div id="page-content">
        <div class="container">
            <div class="row">
                
                <div class="col-sm-12 job-applied all_jobs_list">

                    <div class="candidates-item candidates-single-item">
                        <div class="job_listings job_listingsAjax">
                            <div class="table-responsive">
                                <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                                    <table class="table table-hover dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                                        <thead>
                                        <tr role="row">
                                            <th scope="col" class="sorting_disabled" rowspan="1" colspan="1" style="width: 46px;">Job Title</th>
                                            <th scope="col" class="sorting_disabled" rowspan="1" colspan="1" style="width: 46px;">Salary</th>
                                            <th scope="col" class="sorting_disabled" rowspan="1" colspan="1" style="width: 46px;">Job Type</th>
                                            <th scope="col" class="sorting_disabled" rowspan="1" colspan="1" style="width: 46px;">City</th>
                                            <th scope="col" class="sorting_disabled" rowspan="1" colspan="1" style="width: 46px;">Posted</th>
                                            <th scope="col" class="sorting_disabled" rowspan="1" colspan="1" style="width: 46px;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($jobs as $job)

                                            @if($job)
                                        <tr role="row">
                                            <td>
                                                <strong>
                                                    <a href="{{route('viewjob',$job->id)}}">{{$job->title}}</a>
                                                </strong>
                                            </td>
                                            <td>{{$job->salary}}</td>
                                            <td>{{$job->jobtype->job_type}}</td>
                                            <td>{{$job->joblocation->city->city_name}}</td>
                                            <td>{{$job->created_at->diffForHumans()}} </td>
                                            <td></td>
                                        </tr>
                                            @endif
                                        @endforeach

                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end .container -->
    </div> <!-- end #page-content -->



    <!-- Javascript Files
    ================================================== -->


  
    <script src="https://www.jobs.punjab.gov.pk/new_design/datatables/v1.10.16/js/jquery.dataTables.min.js"></script>
  

















        <div class="jumbotron" style="margin-bottom: -20px;">
            <div class="container">
                <footer>
                            <span class="text-center">
                                <p class="footer_top_margin">&copy; 2018 Company, Inc.</p>
                            </span>
                </footer>
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
                                        <input type="password" class="form-control" id="loginPassword" name="password" value="" required="" title="Please enter your password" placeholder="Enter your password">
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
                                        <input type="password" class="form-control" id="regPassword" name="upassword" value="" required="" title="Please enter your password"  placeholder="Enter 6+ Character Password">
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

@stop


@section('footerlinks');
<!-- All Jquery -->
<script src="{{ asset('js/JQuery.js') }}"></script>
<script src="{{ asset('js/popper.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>

<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/modelbtn.js') }}"></script>
<script !src="">
    $(document).ready( function () {
       $('#myTable').DataTable(
           {
               "ordering":false,
               "scrollY":"500px",
               columnDefs : [
                   {
                       targets:[4],
                       searchable:false

                   },

               ]
           }
       );
    } );
</script>

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



