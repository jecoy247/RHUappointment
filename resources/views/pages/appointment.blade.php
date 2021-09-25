@extends('layouts.layouts')
@section('content')
    <div class="top-margin-five">
        <div class="container">
           <div class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4">
                   <div class="round-form bg-white">
                       <div class="form-group ">
                           <h3 class="b text-accent-one text-center">
                             <strong>Request Appointment Schedule</strong> 
                           </h3>
                       </div>
                       <div class="form-group">
                           <h4 class="text-accent-two text-center">
                               Request Form
                           </h4>
                       </div>
                        <form action="{{route('request-appointment')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Patient Information</label>
                                <input type="text" class="form-control" name="fname" placeholder="First name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lname" placeholder="Last name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Home Address" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact_number" placeholder="Contact Number" required>
                            </div>
                            <div class="form-group">
                                <label for="">Appointment Type</label>
                                <select name="appointment_type" id="" class="form-control" > 
                                    <option value="Check Up">Check Up</option>
                                    <option value="Consult">Consult</option>
                                    <option value="Vaccine">Vaccine</option>
                                    <option value="Immunization">Immunization</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-confirm btn-primary">Submit</button>
                            </div>
                            <div class="form-group">
                                <a href="/" class="btn btn-one btn-primary">Abort</a>
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