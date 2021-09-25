@extends('layouts.layouts')
@section('content')
    <div class="r-top-margin">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                   <div class="round-form bg-white">
                    <div class="form-group ">
                        <h3 class="b text-accent-one text-center">
                            RHU Appointment System
                        </h3>
                    </div>
                    <div class="form-group">
                        <h4 class="text-accent-two text-center">
                            Select Transaction
                        </h4>
                    </div>
                        <div class="form-group">
                            <a href="{{route('request-appointment-page')}}">
                                <button class="btn btn-one btn-primary">Request Appointment</button>
                            </a>
                        </div>
                        <div class="form-group">
                            <a href="{{route('track-appointment-page')}}">
                                <button class="btn btn-one btn-primary">Track Appointment</button>
                            </a>
                        </div>
                        <div class="form-group">
                            <a href="{{route('landing-page')}}">
                                <button class="btn btn-one btn-primary">Never mind</button>
                            </a>
                        </div>
                   </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </div>
@endsection