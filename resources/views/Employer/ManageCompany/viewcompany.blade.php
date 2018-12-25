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
                    <a href="javascript:;" class="dcjq-parent active">
                        <i class="fa fa-building"></i>
                        <span>Manage Company</span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;">
                        <li><a href="{{ route('EmployerCompany.create')}}">Create a Company</a></li>
                        <li><a href="{{ route('EmployerCompany.index') }}">View Company</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="javascript:;" class="dcjq-parent">
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



@section('mainbody')

    <!-- Main wrapper  -->
    <div id="main-wrapper" class="active">

        <!-- Page wrapper  -->
        <div class="page-wrapper" style="min-height: 542px;">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="align-self-center">
                    <h3 class="text-primary text-center">View Company</h3> </div>

            </div>
            <!-- End Bread crumb -->
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
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th style="text-align: left;">Website</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($companies as $company)
                                            <tr>
                                                <th>{{ $company->id }}</th>
                                                <th>{{ $company->company_info }}</th>
                                                <th>{{ $company->address }}</th>
                                                <th><a href="http://{{$company->company_url}}">
                                                        @php
                                                            $inipos = strpos($company->company_url,'.');
                                                            $url = str_replace_first('.',' ',$company->company_url);
                                                            $lastpos= (strpos($url,'.'));
                                                        @endphp
                                                        {{strtoupper(substr($url,$inipos+1,$lastpos-$inipos-1))}}
                                                </a></th>
                                                <th>
                                                    <div class="button-container">
                                                        <form action="{{ route('EmployerCompany.show',$company->id) }}" method="GET">
                                                            <div>
                                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" title="View"></span></button>
                                                            </div>
                                                        </form>
                                                        <form action="{{ route('EmployerCompany.edit',$company->id) }}" method="get">
                                                            <div>
                                                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit" title="Edit"></span></button>
                                                            </div>
                                                        </form>
                                                        <form action="{{ route("EmployerCompany.destroy" ,$company->id) }}" method="POST">
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
