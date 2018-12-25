@extends('Employer.EmployerMasterLayout.master')






   @section('styling')
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


    @section('mainbody')


        <!-- Main wrapper  -->
        <div id="main-wrapper" class="active">

            <div class="page-wrapper" style="min-height: 542px;">
                <!-- Bread crumb -->
                <div class="row page-titles">
                    <div class="align-self-center">
                        <h3 class="text-primary text-center">View Job Post</h3> </div>

                </div>
                <!-- End Bread crumb -->
                <!-- Container fluid  -->
                <div class="container-fluid">
                    <!-- Start Page Content -->
                    <div class="row">


                        <div>
                            <div class="card">
                                <div class="card-title">
                                    <h4>Table Hover </h4>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover ">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($jobs as $job)
                                                <tr>
                                                    <th>{{ $job->id }}</th>
                                                    <th>{{ $job->title }}</th>
                                                    <th>{{ substr($job->description, 0, 25) }}</th>
                                                    <th>
                                                        <div class="button-container">
                                                            <form action="{{ route('EmployerJob.show',$job->id) }}" method="GET">
                                                                <div>
                                                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" title="View"></span></button>
                                                                </div>
                                                            </form>
                                                            <form action="{{ route('EmployerJob.edit',$job->id) }}" method="get">
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit" title="Edit"></span></button>
                                                                </div>
                                                            </form>
                                                            <form action="{{ route("EmployerJob.destroy" ,$job->id) }}" method="POST">
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
</h1>