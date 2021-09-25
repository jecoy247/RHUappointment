@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-1 "></div>
        <div class="col-sm-8 ">
            <article class="intex-table"> 
                <table class="table table-bordered table-hover">
                    <tr class="bg-accent-one text-white">
                        <th class="text-center">Tracking Code</th>
                        <th class="text-center">Contact Number</th>
                        <th class="text-center">Appointment type</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Appointment Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                      @foreach ($results as $result)
                        <tr>
                            <td class="text-black text-center"> {{$result->tracking_code}}</td>
                            <td class="text-black text-center"> {{$result->contact_number}}</td>
                            <td class="text-black text-center"> {{$result->appointment_type}}</td>
                            <td class="text-black text-center"> {{$result->email}}</td>
                            <td class="text-black text-center"> {{$result->appointment_date}}</td>
                            <td class="text-black text-center"> {{$result->status}}</td>
                            <td class="text-black text-center">
                                <form action="{{route('appointment-details')}}" method="post"> 
                                    @csrf
                                    <input type="text" value="{{$result->id}}" class="d-none" name="id">
                                    <input type="text" value="{{$result->tracking_code}}" class="d-none" name="tracking_code">
                                    <button type="submit" class="btn btn-primary">See details</button>
                                </form>
                            </td>
                        </tr>
                      @endforeach
                </table>
        </article>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <div class="message container top-margin-five">
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
                    @if ($message = Session::get('details'))
                        <div class="alert alert-block bg-white border box-shadow">
                            @foreach ($message->all() as $item)
                               <p>Tracking Code: <strong>{{$item->tracking_code}}</strong></p>
                               <p>Firstname: <strong>{{$item->fname}}</strong></p>
                               <p>Lastname: <strong>{{$item->lname}}</strong></p>
                               <p>Address: <strong>{{$item->address}}</strong></p>
                               <p>Contact #: <strong>{{$item->contact_number}}</strong></p>
                               <p>Email: <strong>{{$item->email}}</strong></p>
                               <p>Status: <strong>{{$item->status}}</strong></p>
                               <p>Appointment: <strong>{{$item->appointment_type}}</strong></p>
                               <p>Appointment Date: <strong>{{$item->appointment_date}}</strong></p>
                               <p>Request Made: <strong>{{$item->created_at}}</strong></p>
                               <form action="{{route('request-status-update')}}" method="post">
                                   @csrf @method('PUT')
                                   <div class="form-group">
                                    <label for="">Action</label>
                                    <select name="status" id="status" class="form-control text-center">
                                        <option value="For Validation" class="text-center">for Validation</option>
                                        <option value="being processed">being processed</option>
                                        <option value="rejected">Reject</option>
                                        <option value="grant">Grant</option>
                                    </select>
                                   </div>
                                   <div class="form-group">
                                       <input type="text" value="{{$item->id}}" class="d-none" name="id">
                                       <input type="text" value="{{$item->tracking_code}}" name="tracking_code" class="d-none">
                                        <button class="btn btn-confirm btn-primary" type="submit">Save Changes</button>
                                   </div>
                               </form>
                            @endforeach 
                        </div>
                    @endif
                    @if ($message = Session::get('tracking_code'))
                        <div class="alert alert-warning alert-block box-shadow">
                           <h4>tracking code: <strong>{{ $message }}</strong></h4> 
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection