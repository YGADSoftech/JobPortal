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
                    <h3 class="text-primary text-center">Update Company</h3> </div>

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
                    <form class="form-horizontal" role="form" action="{{route('EmployerCompany.update',$company->id)}}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-lg-3 control-label"> Job Title</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="title" id="title" value="{{ $company->company_info }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Description:</label>
                            <div class="col-lg-8">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"  placeholder="Minimum Character Must be 150">{{ $company->company_description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Established Date</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="date" name="doe" id="doe" value="{{ $company->established_date }}">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-lg-3 control-label">Address</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="add" id="add" value="{{ $company->address }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Company Website</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" name="url" placeholder="https://www.xyz.com" id="url" value="{{ $company->company_url }}">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg ">Save</button>
                        </div>
                    </form>


                </div>









            </div>


        </div>

    </div>
    <!-- End Wrapper -->



@stop


