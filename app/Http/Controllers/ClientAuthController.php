<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthValidationClient;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class ClientAuthController extends Controller
{
    public function register() {
        return view('client.login.register');
    }

    public function login() {
        return view('client.login.login');
    }

    public function registerPost(Request $request, AuthValidationClient $authValidate) {
        $validator = Validator::make($request->all(), $authValidate->rules());
        if($validator->passes()) {
            $user = new User();
            $imagePath = $request->file('document')->store('documents', 'public');
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->document = $imagePath;
            $user->save();

            return redirect()->intended(route('loginClient'))->with('success', Session::get("addSuccess"));
        } else {
            return redirect()->back()->with('error', Session::get("addError"));
        }
    }

    public function loginPost(Request $request, LoginRequest $loginRequest) {
        $validator = Validator::make($request->all(), $loginRequest->rules());

        if($validator->passes()) {
            if(Auth::attempt(['email' => $loginRequest->email, 'password' => $loginRequest->password]) && Auth::user()->role == "Client" && Auth::user()->verified == 1) {
                session(['username'=>Auth::user()->name]);
                session(['LoggedInClient' => true]);
                return redirect()->intended(route('home'))->with('success', Session::get('loginSuccess'));
            } else {
                return redirect()->back()->with('error', "Invalid Email or Password");  
            } 
        }
    }

    public function clientLogout() {
        Session::flush();
        Auth::logout();

        return redirect()->intended(route('home'))->with('success', Session::get('logoutSuccess'));

    }
}
