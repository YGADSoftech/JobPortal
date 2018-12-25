@extends('Master_Layout.master')

@section('upperlinks')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('logo-top.ico')}}">
    <title>CareerPoint - Home Page</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap-3.3.7-dist/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/myCustomStyle.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/alag.css')  }}">
@stop

@section('navbar')
    <div class="jumbotron">
        <h1 class="text-center">Admin Section</h1>

    </div>
@stop

@section('body')

    @if ($errors->any())
    <div class="row">
        <div class="col-xs-offset-5 col-xs-3">
            <div class="well">

        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ $error }} </b>
                <br />
            @endforeach
        </div>
            </div>
        </div>
    </div>
    @endif

    @if (Session::has('msg') && Session::has('signin'))
        <div class="row">
            <div class="col-xs-offset-5 col-xs-3">
                <div class="well">
        <div class="alert alert-danger">
            <div class="glyphicon glyphicon-warning-sign">&nbsp</div><b>{{ Session::get('msg') }}</b>
        </div>
        </div>
        </div>
        </div>
        @endif
    @if(Session::has('msg') && Session::has('signup'))
    <div class="row">
            <div class="col-xs-offset-5 col-xs-3">
                <div class="well">
        <div class="alert alert-success">
            <div class="glyphicon glyphicon-ok">&nbsp</div><b>{{ Session::get('msg') }}</b>
        </div>
        </div>
        </div>
        </div>
    @endif

    @if(count($u)>0)
        <div class="row">
            <div class="col-xs-offset-5 col-xs-3">
                <div class="well">
                    <form id="regForm" method="POST" action="{{ route('adminLogin') }}" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="uemail" class="control-label">Email</label>
                            <input type="text" class="form-control" id="RegUsername" name="uemail" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <label for="upassword" class="control-label">Password</label>
                            <input type="password" class="form-control" id="regPassword" name="upassword" value="" required="" title="Please enter your password">
                            <span class="help-block"></span>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-xs-offset-5 col-xs-3">
                <div class="well">
                    <form id="regForm" method="POST" action="{{ route('adminSignup') }}" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="uemail" class="control-label">Email</label>
                            <input type="text" class="form-control" id="RegUsername" name="uemail" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="ruemail" class="control-label">Retype Email</label>
                            <input type="text" class="form-control" id="retypeRegUsername" name="ruemail" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="upassword" class="control-label">Password</label>
                            <input type="password" class="form-control" id="regPassword" name="upassword" value="" required="" title="Please enter your password">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label for="rupassword" class="control-label">Retype Password</label>
                            <input type="password" class="form-control" id="retypeRegPassword" name="rupassword" value="" required="" title="Please enter your password">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="user_type" name="user_type" value="Admin" required="">
                            <span class="help-block"></span>
                        </div>


                        <button type="submit" class="btn btn-success btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    @endif

@stop