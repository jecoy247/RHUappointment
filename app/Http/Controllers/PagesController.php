<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\Appointments;
class PagesController extends Controller
{
    // showing landing page
    public function index() {
        return view('landing');
    }
    // loging page 
    public function loginpage() {
        return view('login');
    }
    // patient page
    public function patientpage() {
        return view ('pages.patient');
    }
    // showing request appointment form
    public function requestappointment() {
        return view('pages.appointment');
    }
    // showing track record page
    public function trackappointment() {
        $result = Appointments::join('patients', 'patients.id','=', 'appointments.patient_id')
        ->where('appointments.tracking_code', request('000000'))
        ->get(['appointments.*', 'patients.*']);
        return view('pages.trackappointment')->with([
            'results'   =>  $result
        ]);
    }
    // showing admin login page
    public function adminlogin() {
        return view('pages.ad-login');
    }
    // showing admin register page
    public function adminregister() {
        return view('pages.ad-register');
    }
    // showing home page
    public function homepage() {
        $result = Appointments::join('patients', 'patients.id','=', 'appointments.patient_id')
        ->get(['appointments.*', 'patients.*']);
        return view('pages.home')->with([
            'results'    =>  $result
        ]);
    }
}
