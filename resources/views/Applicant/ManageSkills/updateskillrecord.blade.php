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
        <div class="page-wrapper" style="min-height: 542px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="align-self-center">
                    <h3 class="text-primary text-center">Update Skill</h3> </div>

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
                    <form class="form-horizontal" role="form" action="{{route('ApplicantSkill.update',$arr[2])}}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Skill Name</label>
                            <div class="col-lg-8">
                                <select name="skill_set" id="skill_set" class="form-control">
                                    @foreach($skills as $skill)
                                        @if($skill->skill_name == $arr[0])
                                        <option value="{{$skill->id}}" selected >{{$skill->skill_name}}</option>
                                        @else
                                            <option value="{{$skill->id}}"  >{{$skill->skill_name}}</option>\
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        @if($arr[1]==1)
                            <div class="form-group">
                                                                        <label class="col-lg-3 control-label"> Skill Ratio</label>

                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked minColor" name="1"></span>
                                                                <span class="fa fa-star  1" name="2"></span>
                                                                <span class="fa fa-star  1" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level" id="skill_level" value="1">
                                                            </span>
                            </div>
                        @elseif($arr[1]==2)
                            <div class="form-group">
                                                                        <label class="col-lg-3 control-label"> Skill Ratio</label>

                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level" id="skill_level" value="2">
                                                            </span>
                            </div>
                        @elseif($arr[1]==3)
                            <div class="form-group">
                                                                        <label class="col-lg-3 control-label"> Skill Ratio</label>

                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level" id="skill_level" value="3">
                                                            </span>
                            </div>
                        @elseif($arr[1]==4)
                            <div class="form-group">
                                                                        <label class="col-lg-3 control-label"> Skill Ratio</label>

                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1 checked" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level" id="skill_level" value="4">
                                                            </span>
                            </div>
                        @elseif($arr[1]==5)
                            <div class="form-group">
                                                                        <label class="col-lg-3 control-label"> Skill Ratio</label>

                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1 checked" name="4"></span>
                                                                <span class="fa fa-star  1 checked maxColor" name="5"></span>
                                                                <input type="hidden" name="skill_level" id="skill_level" value="5">
                                                            </span>
                            </div>
                        @endif

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                        </div>
                    </form>


                </div>









            </div>
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->



@stop



@section('footerScripts');

<!--Custom JavaScript -->
<script !src="">$(document).ready
    (
        function()
        {
            console.log(($('nav.sidebar-nav>ul>li>ul')).removeClass('in'));
        }
    )
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
