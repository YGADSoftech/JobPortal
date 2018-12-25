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
    <!-- Page wrapper  -->
    <div class="page-wrapper" style="min-height: 542px;">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="align-self-center">
                <h3 class="text-primary text-center">Create Company</h3> </div>

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
                <form class="form-horizontal" role="form" action="{{route('EmployerCompany.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-lg-3 control-label"> Company Name</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="title" id="fname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Company Description</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Minimum Character Must be 150"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Established Date</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="date" name="doe" id="doe">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="add" id="add">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-lg-3 control-label">Company Website</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="url" id="url" placeholder="https://www.xyz.com">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-lg-3 control-label"> </label>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-lg btn-primary ">Save</button>
                        </div>
                    </div>
                </form>


            </div>









        </div>


    </div>
    <!-- End Page wrapper  -->
@stop
