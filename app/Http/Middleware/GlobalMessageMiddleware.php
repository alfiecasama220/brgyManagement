<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class GlobalMessageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(Auth::check()) {
        //     Session::flash('LoggedInClient', true);
        // }       
        
        Session::flash('addSuccess', 'Success! Your action was successful.');
        Session::flash('verify', 'Success! You accepted this user.');
        Session::flash('verifyReject', 'Success! You rejected this user.');
        Session::flash('loginSuccess', 'Success! Your are logged in.');
        Session::flash('logoutSuccess', 'Success! Your are logged out.');
        Session::flash('deleteSuccess', 'Success! The data was deleted.');
        Session::flash('addError', 'Failed! Your action was unsuccessful.');
        Session::flash('emailError', 'Failed! This email was taken from another user.');
        return $next($request);
    }
}
