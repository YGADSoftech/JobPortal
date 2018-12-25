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

    <style>
        .button-container form,
        .button-container form div {
            display: inline;
        }

        .button-container button {
            display: inline;
            vertical-align: middle;
        }
    </style>

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
                    <a href="javascript:;" class="dcjq-parent active">
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
    <!-- Page wrapper  -->
    <div class="page-wrapper" >
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="align-self-center">
                <h3 class="text-primary text-center">Create Education Record</h3> </div>

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

                <form class="form-horizontal" role="form" action="{{route('ApplicantEducation.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default template">
                            <div class="panel-heading">
                                <h4 class="panel-title" id="addCross">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Education Degree
                                    </a>

                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Degree Name</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" placeholder="Degree Name" id="degree_name[]" name="degree_name[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Institute Name</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="text" placeholder="Institute Name" id="institute_name[]" name="institute_name[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Starting Date</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="date" id="start_date[]" name="start_date[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Completion Date</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="date" id="completion_date[]" name="completion_date[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Percentage</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="number" placeholder="Percenrage" id="percentage[]" step="0.01" name="percentage[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> CGPA </label>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="number" placeholder="cgpa" id="cgpa[]" name="cgpa[]" step="0.01">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-xs btn-primary">Submit</button>
                        <button type="button" class="btn btn-xs btn-primary btn-add-panel">
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
            .text("Education Degree ");
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