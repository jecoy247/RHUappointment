@extends('layouts.layouts')
@section('content')
    <div class="r-top-margin">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="round-form bg-white">
                        <form action="{{route('admin-login')}}" method="post"> 
                            @csrf
                            <div class="form-group">
                                <h3 class="text-center text-accent-one">
                                    RHU Appointment System
                                </h3>
                            </div>
                            <div class="form-group">
                                <h4 class="text-center text-accent-two">
                                    Admin Login
                                </h4>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 float-right">
                                        <button type="submit" class="btn btn-confirm btn-primary">Login</button>
                                    </div>
                                    <div class="col-sm-6 float-left">
                                        <a  href="{{route('admin-register-page')}}"
                                             class="btn btn-one btn-primary">Register</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="message">
                            <!-- error/succes msg-->
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                @if (count($errors)>0)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <!-- error/succes msg-->
                            @if ($message = Session::get('instruction'))
                                <div class="alert alert-warning alert-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if ($message = Session::get('tracking_code'))
                                <div class="alert alert-success alert-block box-shadow">
                                   <h4>tracking code: <strong>{{ $message }}</strong></h4> 
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection