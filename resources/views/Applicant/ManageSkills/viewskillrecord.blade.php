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
        .button-container form,
        .button-container form div {
            display: inline;
        }

        .button-container button {
            display: inline;
            vertical-align: middle;
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> !-->

 @stop


@section('mainbody')

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">


                    <div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                        <tr>
                                            <th>Skill</th>
                                            <th style="text-align: left;"> Skill Level</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($user->applicant_profile->skill_set as $s)
                                            <tr>
                                                <th>{{$s->skill_name}}</th>
                                                <th>@if($s->pivot->skill_level==1)
                                                        <div class="form-group">
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked minColor" name="1"></span>
                                                                <span class="fa fa-star  1" name="2"></span>
                                                                <span class="fa fa-star  1" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </div>
                                                    @elseif($s->pivot->skill_level==2)
                                                        <div class="form-group">
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </div>
                                                    @elseif($s->pivot->skill_level==3)
                                                        <div class="form-group">
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </div>
                                                    @elseif($s->pivot->skill_level==4)
                                                        <div class="form-group">
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1 checked" name="4"></span>
                                                                <span class="fa fa-star  1" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </div>
                                                    @elseif($s->pivot->skill_level==5)
                                                        <div class="form-group">
                                                            <span class="col-lg-9 ">
                                                                <span class="fa fa-star  1 checked" name="1"></span>
                                                                <span class="fa fa-star  1 checked" name="2"></span>
                                                                <span class="fa fa-star  1 checked" name="3"></span>
                                                                <span class="fa fa-star  1 checked" name="4"></span>
                                                                <span class="fa fa-star  1 checked maxColor" name="5"></span>
                                                                <input type="hidden" name="skill_level[]" id="skill_level[]">
                                                            </span>
                                                        </div>
                                                    @endif
                                                </th>

                                                <th>
                                                    <div class="button-container">
                                                        <form action="{{ route('ApplicantSkill.edit',$s->pivot->id) }}" method="get">
                                                            <div>
                                                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit" title="Edit"></span></button>
                                                            </div>
                                                        </form>
                                                        <form action="{{ route("ApplicantSkill.destroy" ,$s->id) }}" method="POST">
                                                            <div>
                                                                {{ method_field('DELETE') }}
                                                                {{csrf_field()}}
                                                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" title="Delete"></span></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </th>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>

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
@stop
