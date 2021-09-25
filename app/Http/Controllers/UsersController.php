<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    // register admin
    public function register(Request $request) {
        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  'required',
            'password'  =>  'required',
            'confirm_password'  =>  'required'
        ]);
        if (request('password') == request('confirm_password')) {
            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->save();
            return redirect(route('admin-login-page'))->with([
                'success'   =>  'Registration was Successful',
                'instruction'   =>  'You can now login using your newly registered credentials.'
            ]);
        } else {
            return back()->with([
                'error' =>  'Register Failed',
                'instruction'   =>  'Please make sure that all fields are filled accordingly!'
            ]);
        }
        
    }
    // login adming
    public function login(Request $request) {
        $this->validate($request, [
            'email' =>  'required',
            'password'  =>  'required'
        ]);
        $id = User::where('email', request('email'))->value('id');
        $name = User::where('email', request('email'))->value('name');
        $email = User::where('email', request('email'))->value('email');
        $password = User::where('email', request('email'))->value('password');
        if($email == request('email')) {
            session()->put('id', $id);
            session()->put('name', $name);
            session()->put('email', $email);
            return redirect(route('home-page'));
        } else {
            return back()->with([
                'error' =>  'Login Failed',
                'instruction'   =>  'Account not Found'
            ]);
        }
    }
    // logout admin
    public function logout() {
        session()->remove('id');
        session()->remove('name');
        session()->remove('email');
        return redirect(route('admin-login-page'));
    }
 }
