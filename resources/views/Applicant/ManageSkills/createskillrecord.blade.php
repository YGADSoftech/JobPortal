@extends('Applicant.ApplicantMasterLayout.master')

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
                    <a href="javascript:;" class="dcjq-parent active">
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

        input.star { display: none; }

        label.star {
            float: right;
            padding: 10px;
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }

        input.star:checked ~ label.star:before {
            content: '\2605';
            color: #FD4;
            transition: all .25s;
        }

        label.star:before {
            content: '\2605';
        }
    </style>
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
    </style>
@stop



@section('mainbody')

    <!-- Page wrapper  -->
    <div class="page-wrapper" >
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="align-self-center">
                <h3 class="text-primary text-center">Create Skills</h3> </div>

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
               
                <form class="form-horizontal" role="form" action="{{route('ApplicantSkill.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default template">
                            <div class="panel-heading">
                                <h4 class="panel-title text-center" id="addCross">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Skill Set</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Skill Name</label>
                                        <div class="col-lg-8">
                                            <select name="skill_set[]" id="skill_set[]" class="form-control">
                                                <option value="empty">Choose You Skills</option>
                                                @foreach($skills as $skill)
                                                    <option value="{{$skill->id}}" >{{$skill->skill_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> Skill Ratio</label>
                                        <span class="col-lg-9 ">
                                            <span class="fa fa-star  1" name="1"></span>
                                            <span class="fa fa-star  1" name="2"></span>
                                            <span class="fa fa-star  1" name="3"></span>
                                            <span class="fa fa-star  1" name="4"></span>
                                            <span class="fa fa-star  1" name="5"></span>
                                            <input type="hidden" name="skill_level[]" id="skill_level[]">
                                        </span>
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
                .text("Skill Set ");
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
            var array = $newPanel.find('.fa.fa-star').attr("class");
            var lastClass = array.match(/\d/g);

            $newPanel.find('.fa.fa-star').removeClass(lastClass);
            console.log($newPanel.find('.fa.fa-star').parent().children().last().val(0));
            console.log($newPanel.find('.fa.fa-star').removeClass("checked"));
            console.log($newPanel.find('.fa.fa-star').removeClass("minColor"));
            console.log($newPanel.find('.fa.fa-star').removeClass("maxColor"));
            $newPanel.find('.fa.fa-star').addClass((hash.toString()));
            // console.log($newPanel.html());
            $newPanel.find('.fa.fa-star').on("click",function(){

            var k = ($(this).attr('class'))
            // console.log(k);
            var name = ($(this).attr('name'));
            var tagclass = k.match(/\d/g);
            // console.log(tagclass);
            if($(this).attr("name")==5)
            {
                $(this).addClass("maxColor");
                $(this).parent().children().first().removeClass("minColor");
            }
            if($(this).attr("name")==1)
            {
                $(this).addClass("minColor");
                $(this).parent().children().last().prev().removeClass("maxColor");
            }

            $("."+tagclass).each(function () {

                //  if($(this).attr("name")==1 && $(this).hasClass("minColor"))
                //  {
                //
                //  }
                // else
                //  {
                //      $(this).removeClass("checked");
                //  }
                if($(this).attr("name") <= name) {
                    $(this).addClass("checked");
                    if ($(this).attr("name") != 1) {
                        $(this).parent().children().first().removeClass("minColor");
                    }
                    if ($(this).attr("name") <= 4) {
                        $(this).parent().children().last().prev().removeClass("maxColor");
                    }
                    else
                    {
                        $(this).parent().children().last().prev().addClass("maxColor");

                    }
                }
                //  if($(this).attr("name") <= name && !$(this).hasClass("maxColor"))
                // {
                //     $(this).addClass("checked");
                //   //  if($(this).attr("name") != 5)
                //   //  console.log($(this).parent().children().last().prev().removeClass("maxColor"))
                // }
                else
                {
                    $(this).removeClass("checked");
                }
            })
            $("."+tagclass).parent().find("input").val(name);
            });
            $("#accordion").append($newPanel.fadeIn());

        });
    </script>

    <script>

        $(".fa.fa-star").on("click",function(){
            var k = ($(this).attr('class'))
            // console.log(k);
            var name = ($(this).attr('name'));
            var tagclass = k.match(/\d/g);
            // console.log(tagclass);
            if($(this).attr("name")==5)
            {
                $(this).addClass("maxColor");
                $(this).parent().children().first().removeClass("minColor");
            }
            if($(this).attr("name")==1)
            {
                $(this).addClass("minColor");
                $(this).parent().children().last().prev().removeClass("maxColor");
            }

            $("."+tagclass).each(function () {

                //  if($(this).attr("name")==1 && $(this).hasClass("minColor"))
                //  {
                //
                //  }
                // else
                //  {
                //      $(this).removeClass("checked");
                //  }
                if($(this).attr("name") <= name) {
                    $(this).addClass("checked");
                    if ($(this).attr("name") != 1) {
                        $(this).parent().children().first().removeClass("minColor");
                    }
                    if ($(this).attr("name") <= 4) {
                        $(this).parent().children().last().prev().removeClass("maxColor");
                    }
                    else
                    {
                        $(this).parent().children().last().prev().addClass("maxColor");

                    }
                }
                //  if($(this).attr("name") <= name && !$(this).hasClass("maxColor"))
                // {
                //     $(this).addClass("checked");
                //   //  if($(this).attr("name") != 5)
                //   //  console.log($(this).parent().children().last().prev().removeClass("maxColor"))
                // }
                else
                {
                    $(this).removeClass("checked");
                }
            })
            $("."+tagclass).parent().find("input").val(name);
        });

    </script>
@stop