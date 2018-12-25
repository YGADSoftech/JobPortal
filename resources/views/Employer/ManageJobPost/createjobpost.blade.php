@extends('Employer.EmployerMasterLayout.master')

@section('sidebar')
<ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{route('employerProfile')}}">
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
                    <a href="javascript:;" class="dcjq-parent active">
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


@section('styling')

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
        .panel-default > .panel-heading
        {
            background-color: #f1f2f7;
        }
        .panel
        {
            background-color: #f1f2f7;
        }
    </style>

 @stop


@section('mainbody')

    <!-- Main wrapper  -->
    <div id="main-wrapper" class="active">

        <!-- Page wrapper  -->
        <div class="page-wrapper" style="min-height: 542px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="align-self-center">
                    <h3 class="text-primary text-center">Create Job Post</h3> </div>

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
                    <form class="form-horizontal" role="form" action="{{route('EmployerJob.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Job Title</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="title" id="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Description</label>
                            <div class="col-lg-8">
                                <textarea class="form-control" name="description" placeholdr="
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"  placeholder="Minimum Character Must be 150" id="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Job Salary</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="salary" id="salary">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last Apply Date</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date" name="lad" id="lad">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Job Type:</label>
                            <div class="col-lg-8">
                                <select name="jobtype" id="jobtype" class="form-control">
                                    <option value="0" selected>Select Job Type</option>
                                    @foreach($jobtypes as $jobType)
                                        <option value="{{ $jobType->id  }}" >{{$jobType->job_type}}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Country </label>
                            <div class="col-lg-8">
                                <select name="country" id="country" class="form-control">
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
                                <select name="state" id="state" class="form-control">
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
                                <select name="city" id="city" class="form-control">
                                    <option value="0">Choose Your City</option>
                                    @foreach($city as $ci)
                                        <option value="{{$ci->id}}">{{$ci->city_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Zip Code </label>
                            <div class="col-lg-8">
                                <select name="zip" id="zip" class="form-control">
                                    <option value="0">Zip Code</option>
                                    @foreach($zip as $zi)
                                        <option value="{{$zi->id}}">{{$zi->zip_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Company </label>
                            <div class="col-lg-8">
                                <select name="com" id="com" class="form-control">
                                    <option value="0">Select Company</option>
                                    @foreach($company as $cam)
                                        <option value="{{$cam->id}}">{{$cam->company_info}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Adrees</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="address" id="address">
                            </div>
                        </div>

                        <div class="panel-group form-group" id="accordion">
                            <div class="panel panel-default template">
                                <div class="panel-heading">
                                    <h4 class="panel-title" id="addCross">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Required Skills</a>
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
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                            <button type="button" class="btn btn-lg btn-primary btn-add-panel">
                                <i class="glyphicon glyphicon-plus"></i> Add new panel
                            </button>
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

<script !src="">$(document).ready
    (
        function()
        {
            console.log(($('nav.sidebar-nav>ul>li>ul')).removeClass('in'));
        }
    )
</script>
<script>
    var $template = $(".template");

    var hash = 1;
    $(".btn-add-panel").on("click", function () {
        var $newPanel = $template.clone();
        $newPanel.find(".accordion-toggle").attr("href",  "#" + (++hash)).text("Required Skills");
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