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
                               Sign in as
                           </h4>
                       </div>
                        <div class="form-group">
                            <a href="{{route('admin-login-page')}}">
                                <button class="btn btn-one btn-primary">As Admin</button>
                            </a>
                        </div>
                        <div class="form-group">
                            <a href="{{route('patient-page')}}">
                                <button class="btn btn-one btn-primary">As Patient</button>
                            </a>
                        </div>
                   </div>
               </div>
               <div class="col-sm-4"></div>
           </div>
        </div>
    </div>
@endsection