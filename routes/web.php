<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AppointmentsController;
// showing landing page
Route::get('/', [PagesController::class, 'index'])->name('landing-page');
// showing login page
Route::get('/login', [PagesController::class, 'login'])->name('login-page');
// showing patient transaction page
Route::get('/patient', [PagesController::class, 'patientpage'])->name('patient-page');
// showing request appointment form
Route::get('/patient/request/appointment', [PagesController::class, 'requestappointment'])->name('request-appointment-page');
// inserting to patients table
Route::post('/patient/request/appointment', [PatientsController::class, 'insert'])->name('request-appointment');
// track record page
Route::get('/patient/request/trackappointment', [PagesController::class, 'trackappointment'])->name('track-appointment-page');
// search appointments
Route::post('/patient/request/trackappointment', [PatientsController::class, 'search'])->name('track-appointment');

// adming pages
// -- adming login page
Route::get('/admin/login', [PagesController::class, 'adminlogin'])->name('admin-login-page');
// -- admin login function
Route::post('/admin/login', [UsersController::class, 'login'])->name('admin-login');
// -- adming logout function
Route::post('/admin/home', [UsersController::class, 'logout'])->name('admin-logout');
// -- adming register page
Route::get('/admin/register', [PagesController::class, 'adminregister'])->name('admin-register-page');
// -- admin register function
Route::post('/admin/register', [UsersController::class, 'register'])->name('admin-register');
// admin home page
Route::get('/admin/home', [PagesController::class, 'homepage'])->name('home-page');
// admin showing appointment details
Route::post('/admin/viewappointment', [AppointmentsController::class, 'appointmentdetails'])->name('appointment-details');
// admin request status update
Route::put('/admin/viewappointment', [AppointmentsController::class, 'requeststatusupdate'])->name('request-status-update');