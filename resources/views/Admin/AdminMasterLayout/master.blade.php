<!doctype html>

<html lang="en" class="sb-init">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{asset('logo-top.ico')}}">

    <title>Career Point - Job Portal System</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/dashboard/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('css/Vendor/font_awesome/font-awesome.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/Vendor/fontawesome/fa/css/all.css')}}" >

    <!--right slidebar-->
    <link href="{{asset('Theme/css/slidebars.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{asset('Theme/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('Theme/css/style-responsive.css')}}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="http://thevectorlab.net/flatlab/js/html5shiv.js"></script>
    <script src="http://thevectorlab.net/flatlab/js/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;display: block;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;padding: 5px 5px 8px 5px;font: 10px arial, san serif;text-align: left;}</style>
    <style>
        .btn
        {
            padding: 5px 0px;
        }
    </style>
    @yield('styling')
</head>

<body >
<section id="container">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
        <!--logo start-->
        <a href="{{route('home')}}" class="logo">Career<span>Point</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                        <i class="fas fa-envelope"></i>
                        <span class="badge bg-important">{{$total_message}}</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                            <p class="red">You have {{$total_message}} new messages</p>
                        </li>
                        @for($i=0;$i<count($ids);$i++)
                            <li>
                                <a href="{{route('showmessagebox',[$ids[$i]])}}">
                                    <span class="photo"><img alt="avatar" src="http://thevectorlab.net/flatlab/./img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                    <span class="from">{{\App\User::find($ids[$i])->user_name}}</span>
                                    <span class="time"> {{$time[$i]}}</span>
                                    </span>
                                    <span class="message">
                                        {{$data[$i]}}
                                    </span>
                                </a>
                            </li>
                        @endfor

                        <li>
                            <a href="{{route('inbox',[\Illuminate\Support\Facades\Auth::id()])}}">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                        @php
                            $total_notfication = 0;

                            $noti = \Illuminate\Support\Facades\Auth::user()->notify;
                            foreach ($noti as $no)
                            {
                                if($no->is_seen == 0)
                                 $total_notfication++;
                            }

                        @endphp

                        <i class="fas fa-bell"></i>
                        <span class="badge bg-warning">{{$total_notfication}}</span>
                    </a>
                    <ul class="dropdown-menu extended notification">



                    <!-- Message -->
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                            <p class="yellow">You have {{$total_notfication}} new notifications</p>
                        </li>
                        @foreach ($noti as $no)
                            @if($no->is_seen == 0)

                                <li>
                                    <a href="{{route('status',$no->job->id?$no->job->id:'')}}">
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        <h5 style="display:inline-block;">{{$no->job->title}}</h5>
                                        <span class="small italic pull-right">{{($no->created_at)->diffForHumans()}}</span>
                                    </a>
                                </li>
                            @endif

                        @endforeach
                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{asset('Images/profile')}}/{{$user->profile_img}}" height="35px" width="35px">
                        <span class="username">{{$user->user_name}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li><a href="{{ route('viewAdminProfile')}}"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>

                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse " tabindex="0" style="overflow: hidden; outline: none;">
            <!-- sidebar menu start-->
            @yield('sidebar')
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--state overview start-->
            <!--state overview end-->

            @yield('mainbody')

        </section>
    </section>
    <!--main content end-->



    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
        2018 Company, Inc.
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/JQuery.js') }}"></script>

<script src="{{asset('Theme/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{asset('Theme/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('Theme/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('Theme/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('Theme/js/jquery.sparkline.js')}}" type="text/javascript"></script>
<script src="{{asset('Theme/js/jquery.easy-pie-chart.js')}}"></script>
<script src="{{asset('Theme/js/owl.carousel.js')}}"></script>
<script src="{{asset('Theme/js/jquery.customSelect.min.js')}}"></script>
<script src="{{asset('Theme/js/respond.min.js')}}"></script>

<!--right slidebar-->
<script src="{{asset('Theme/js/slidebars.min.js')}}"></script>

<!--common script for all pages-->
<script src="{{asset('Theme/js/common-scripts.js')}}"></script><div id="ascrail2000" class="nicescroll-rails nicescroll-rails-vr" style="width: 3px; z-index: auto; background: rgb(64, 64, 64); cursor: default; position: fixed; top: 0px; left: 207px; height: 631px; display: none; opacity: 0;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 3px; height: 377px; background-color: rgb(232, 64, 63); background-clip: padding-box; border-radius: 10px;"></div></div><div id="ascrail2000-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 3px; z-index: auto; background: rgb(64, 64, 64); top: 628px; left: 0px; position: fixed; cursor: default; display: none; width: 207px; opacity: 0;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 3px; width: 210px; background-color: rgb(232, 64, 63); background-clip: padding-box; border-radius: 10px;"></div></div>

<!--script for this page-->
    <script src="{{asset('Theme/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('Theme/js/easy-pie-chart.js')}}"></script>
<!-- <script src="{{asset('Theme/js/count.js')}}"></script> -->

<script>

    //owl carousel

    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    $(window).on("resize",function(){
        var owl = $("#owl-demo").data("owlCarousel");
        // owl.reinit();
    });

</script>
@yield('footerScripts')

</body>
</html>
