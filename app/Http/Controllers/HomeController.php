<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {       
        if(Auth::check()) {
            $email = Auth::user()->email;
            $loginTime = session()->get('loginTime');
            return view('login.home', compact(['email', 'loginTime']));
        } else {
            return redirect(route('login-form'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('loginTime');
        return redirect(route('login-form'));
    }
}
