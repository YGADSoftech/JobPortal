@extends('Applicant.ApplicantMasterLayout.master')

@section('styling')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/Admin/favicon.png')}}">
    <title>CareerPoint - Admin Dashboard</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->
@stop

@section('sidebar')
<ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{route('applicantProfile')}}">
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
                    <a href="javascript:;" class="dcjq-parent active">
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
    <!-- Page wrapper  -->
    <div class="page-wrapper" >
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="align-self-center">
                <h3 class="text-primary text-center">Create Experience Record</h3> </div>

        </div>
        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">×</a>
                    @foreach ($errors->all() as $error)
                        <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }}</b>
                        <br />
                                    @endforeach

              
                    
                </div>
                @endif
                <form class="form-horizontal" role="form" action="{{route('ApplicantExperience.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default template">
                            <div class="panel-heading">
                                <h4 class="panel-title text-center" id="addCross">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Experience Record
                                    </a>

                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Job Title</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" placeholder="Job Title" id="job_title[]" name="job_title[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Job Description</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" placeholder="Minimum Character Must be 150" name="job_desc[]" id="job_desc[]" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Company Name</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" placeholder="Company Name" type="text" id="comp_name[]" name="comp_name[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Joining Date</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="date" id="join_date[]" name="join_date[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Quit Date</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="date" id="quit_date[]" name="quit_date[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Is Job</label>
                                        <div class="col-lg-2 col-lg-offset-2">
                                            <input class="checkbox" type="checkbox" id="is_job[]" name="is_job[]">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Country </label>
                                        <div class="col-lg-8">
                                            <select name="country[]" id="country[]" class="form-control">
                                                <option value="0">Choose Your Country</option>
                                                @foreach($country as $con)
                                                <option value="{{$con->id}}">{{$con->country_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> State </label>
                                        <div class="col-lg-8">
                                            <select name="state[]" id="state[]" class="form-control">
                                                <option value="0">Choose Your State</option>
                                                @foreach($state as $st)
                                                    <option value="{{$st->id}}">{{$st->state_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> City </label>
                                        <div class="col-lg-8">
                                            <select name="city[]" id="city[]" class="form-control">
                                                <option value="0">Choose Your City</option>
                                                @foreach($city as $ci)
                                                    <option value="{{$ci->id}}">{{$ci->city_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        <button type="button" class="btn btn-lg btn-primary btn-add-panel">
                            <i class="glyphicon glyphicon-plus"></i> Add new panel
                        </button>
                    </div>
                  </form>
            </div>









        </div>

    </div>
    <!-- End Page wrapper  -->
@stop

@section('footerScripts')
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
        $( "#addForm" ).click(function() {
            //   var r = document.createElement('span');
            var y = document.createElement("INPUT");
            y.setAttribute("type", "text");
            y.setAttribute("placeholder", "Name");
            //   var g = document.createElement("IMG");
            //   g.setAttribute("src", "delete.png");

            y.setAttribute("Name", "test[]");
            //   r.appendChild(y);
            //   g.setAttribute("onclick", "removeElement('myForm','id_" + 1 + "')");
            //   r.appendChild(g);
            //  r.setAttribute("id", "id_" + 1);
            document.getElementById("add").appendChild(y);
        });
    </script>

    <script>

        var $template = $(".template");

        var hash = 1;
        $(".btn-add-panel").on("click", function () {
            var $newPanel = $template.clone();
            $newPanel.find(".accordion-toggle").attr("href",  "#" + (++hash))
                .text("Experience Record ");
            $newPanel.find(".panel-collapse").attr("id", hash).addClass("collapse");
            var x = document.createElement("SPAN");
            x.setAttribute("aria-hidden" ,"true");
            x.setAttribute("id" ,"remove");
            x.setAttribute("style","cursor: pointer;");
            x.classList.add("glyphicon");
            x.classList.add("glyphicon-remove");
            x.classList.add("pull-right");
            x.onclick = function dynamicEvent() {
                this.parentElement.parentElement.parentElement.remove();
            }
            $newPanel.find('#addCross').append(x);

            ($newPanel.find(".form-control").eq(0).val(""));
            ($newPanel.find(".form-control").eq(1).val(""));
            ($newPanel.find(".form-control").eq(2).val(""));
            ($newPanel.find(".form-control").eq(3).val(""));
            ($newPanel.find(".form-control").eq(4).val(""));
            ($newPanel.find(".form-control").eq(5).val(""));
            $("#accordion").append($newPanel.fadeIn());

        });
    </script>
@stop