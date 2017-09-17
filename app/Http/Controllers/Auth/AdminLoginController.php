<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth ;
class AdminLoginController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminlogout');
    }

    public function showLoginForm(){

        return view('auth.admin-login');
    }


    public function login(Request $request){

        // validate form

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'

        ]);

        // attempt to log user in

        if (Auth::guard('admin')->attempt(['email'=> $request->email,'password'=>$request->password], $request->remember)){
            //if successful , then redirect the user to the intended location
            return redirect()->route('admin.dashboard');
        }
        // if unsuccessful then redirect back to login form again

        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function adminlogout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
