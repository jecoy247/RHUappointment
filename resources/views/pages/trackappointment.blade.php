@extends('layouts.layouts')
@section('content')
    <div class="top-margin-five">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="{{route('track-appointment')}}" method="post">
                    @csrf
                    <div class="round-form">
                        <div class="form-group">
                            <h2 class="text-accent-one text-center"><strong>Track Appointment Schedule</strong></h2>
                        </div>
                        <div class="form-group">
                            <h4 class="text-accent-two text-center">
                                Enter Tracking Code
                            </h4>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control text-center" name='tracking_code' placeholder="Tracking Code" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-confirm btn-primary">Track</button>
                                </div>
                                <div class="col-sm-6">
                                    <a href="/" class="btn btn-one btn-primary"> Cancel </a>
                                </div>
                            </div>
                            
                        </div>
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
                        <div class="form-group">
                            @if (count($results) > 0)
                                <div class="row  padding-ten">
                                    <div class="col-sm-6 text-right">
                                        <p>Tracking Code: </p>    
                                        <p>Appointment Date:</p>
                                        <p>Status:</p>
                                        <p>Request Made:</p>
                                        <p>Request by:</p>
                                    </div>
                                    <div class="col-sm-6 text-left">
                                        @foreach ($results as $result)
                                            <p><strong>{{$result->tracking_code}}</strong></p>
                                            <p><strong>{{$result->appointment_date}}</strong></p>
                                            <p><strong>{{$result->status}}</strong></p>
                                            <p><strong>{{$result->created_at}}</strong></p>
                                            <p><strong>{{$result->lname}}, {{$result->fname}}</strong></p>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="com-sm-3"></div>
        </div>
    </div>
@endsection