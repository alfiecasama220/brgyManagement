<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthValidation;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Contents;

class AdminControllerr extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function register() {
        return view('admin.register');
    }

    public function dashboard() {

        $contents = Contents::all();

        return view('admin.pages.dashboard', compact('contents'));
    }

    public function profiles() {
        return view('admin.pages.profiles');
    }

    public function users() {

        // 
    }

    public function registerPost(Request $request , AuthValidation $requestValidation) {

        $request->validate([$requestValidation]);

        $validator = Validator::make($request->all() , $requestValidation->rules());

        if($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'Admin';
            $user->save();

            return redirect()->intended(route('login'))->with('success', 'Registered Successfully');
        }
    }

    public function loginPost(Request $request, LoginRequest $loginRequest) {
        $validator = Validator::make($request->all(), $loginRequest->rules());

        // $credentials = $request->only('email', 'password');
        
        if($validator->passes()) {

            if(Auth::attempt(['email' => $loginRequest->email, 'password' => $loginRequest->password ])) {
                Session(['role'=>Auth::user()->role]);
                return redirect()->intended(route('dashboard'));
            } else { 
                return redirect()->back()->with('error', 'Invalid Email or Password');
            }

        } else {
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }

        
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect()->intended(route('login'))->with('success', 'You have been logged out');
    }
}
