<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginForm() {
        return view('login.login-form');
    }

    public function login(Request $request) {
        $rules =  [
            'email' =>'required|email|min:4|exists:users',
            'password' => 'required|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            dd("ok");
            $email = $request->input('email');
            $password = $request->input('password');
            if(Auth::attempt(['email' => $email, 'password' => $password])) {
                $email = $request->input('email');
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $loginTime = date('Y-m-d H:i');
                $request->session()->put('loginTime', $loginTime);
                return view('login.home', compact('email', 'loginTime'));
            } else {
                return redirect('login');
            }
        }
    }

    public function resetPasswordForm() {
        return view('login.reset-password-form');
    }
}
