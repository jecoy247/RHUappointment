<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\Appointments;
use Carbon\Carbon;
class PatientsController extends Controller
{
    // inserting patient credentials
    public function insert(Request $request) {
        $this->validate($request, [
            'fname' => 'required',
            'lname' =>  'required',
            'address'   =>  'required',
            'contact_number'    =>  'required',
            'appointment_type'  =>  'required',
            'email' =>  'required|unique:patients'
        ]);
            // generating tracking code
            $trackingcode = random_int(100000, 999999);
            // -- Automation of Schedules
                $count = Appointments::where('status', 'Pending')->count();
                if ($count <= 0) { 
                    // saving data to patietnts table
                    $patients = new Patients();
                    $patients->fname = request('fname');
                    $patients->lname = request('lname');
                    $patients->address = request('address');
                    $patients->contact_number   = request('contact_number');
                    $patients->appointment_type = request('appointment_type');
                    $patients->email    = request('email');
                    $patients->save();
                    // saving to appointments table
                    $appointments = new Appointments();
                    $patient_id = Patients::where('email', request('email'))->value('id');
                    $appointments->patient_id = $patient_id;
                    $appointments->tracking_code = $trackingcode;
                    $appointment_date = Carbon::tomorrow()->format('Y-m-d'); 
                    $appointments->appointment_date = $appointment_date;
                    $appointments->status = 'Pending';
                    $appointments->save();
                } else {
                    // saving data to patietnts table
                    $patients = new Patients();
                    $patients->fname = request('fname');
                    $patients->lname = request('lname');
                    $patients->address = request('address');
                    $patients->contact_number   = request('contact_number');
                    $patients->appointment_type = request('appointment_type');
                    $patients->email    = request('email');
                    $patients->save();
                    // saving to appointments table
                    $appointments = new Appointments();
                    $patient_id = Patients::where('email', request('email'))->value('id');
                    $appointments->patient_id = $patient_id;
                    $appointments->tracking_code = $trackingcode;
                    $appointment_date = Carbon::tomorrow()->format('Y-m-d');
                    if((Appointments::where('appointment_date', $appointment_date)->count()) > 5) {
                        $days = 1;
                        $appointment_date = Carbon::tomorrow()->addHour(24 * ($days))->format('Y-m-d');
                        do {
                            $appointment_date = Carbon::tomorrow()->addHour(24 * ($days))->format('Y-m-d');
                            $appointments->appointment_date = $appointment_date;
                            $appointments->status = 'Pending';
                            $days++;
                            $appointments->save();
                        } while((Appointments::where('appointment_date', $appointment_date)->count()) >= 6);
                    } else {
                        $appointments->appointment_date = $appointment_date;
                        $appointments->status = 'Pending';
                        $appointments->save();
                    }
                }
            // -- end of Automation
            
        return back()->with([
            'success'   => 'Request Sent Successfully',
            'instruction'  => 'Your request will be processed by our validation team, a response will be made at the earliest time.
                                For the mean time, check the status of your request using your tracking code provided below.',
            'tracking_code' =>  $trackingcode,
        ]);
    }

    // search appointment
    public function search(Request $request) {
        $this->validate($request, [
            'tracking_code' =>  'required'
        ]);
        $result = Appointments::join('patients', 'patients.id','=', 'appointments.patient_id')
                        ->where('appointments.tracking_code', request('tracking_code'))
                        ->get(['appointments.*', 'patients.*']);
        if(count($result) > 0) {
            return view('pages.trackappointment')->with([
                'success'   =>  'Results Found',
                'results'   => $result
            ]);
        } else {
            return back()->with([
                'error' => 'No results found'
            ]);
        }
        
    }
}