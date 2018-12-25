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

@section('mainbody')

    <div id="main-wrapper" class="active">

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

                    <form class="form-horizontal" role="form" action="{{route('EmployerCompany.edit',$company->id)}}" method="GET">

                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Job Title</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="title" id="title" value="{{ $company->company_info }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-8">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" readonly>{{ $company->company_description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Established Date</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date" name="doe" id="doe" readonly value="{{ $company->established_date }}">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-lg-3 control-label">Address</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="add" readonly id="add" value="{{ $company->address }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Company Website</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="url" readonly id="url" value="{{ $company->company_url }}">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg ">Edit</button>
                        </div>
                    </form>


                </div>









            </div>


        </div>

    </div>



@stop
