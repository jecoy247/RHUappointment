<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\Appointments;
use Carbon\Carbon;
class AppointmentsController extends Controller
{
    // showing appointment details
    public function appointmentdetails(Request $request) {
        $this->validate($request, [
            'id'    =>  'required',
            'tracking_code' =>  'required'
        ]);
        $details = Appointments::join('patients', 'patients.id','=', 'appointments.patient_id')
                        ->where('appointments.patient_id', request('id'))
                        ->get(['appointments.*', 'patients.*']);
        return back()->with([
            'success'   =>  'Patient Request & Details',
            'details'  =>   $details
        ]);
    }
    // updating request status 
    public function requeststatusupdate (Request $request) {
        $this->validate($request, [
            'id'    =>  'required',
            'status'    =>  'required'
        ]);
        Appointments::where('id',   request('id'))
            ->update(array('status' =>  request('status')));
        return back()->with([
            'success'   =>  'Patient request status has been updated',
            'tracking_code' =>  request('tracking_code')
        ]);
    }
}
