<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class LoginController extends Controller
{
    public function login(Request $request) {
        
        $this->validate($request, [
            "email" => "required|exists:user,email|email",
            "password" => "required"
        ]);
        $email = $request->email;
        $pass = md5($request->password);

        $check = User::where('email', $email)->where('password', $pass)->count();

        if(!($check > 0)) {
            return redirect('login')->with('status', 'ada yang salah');
        }

        $take = User::where('email', $email)->where('password', $pass)->first();
        session(['email' => $take->email]);
        session(['password' => true]);
        return redirect('mcharts');
    }

    public function logout(Request $req) {
        $req->session()->regenerate();
        $req->session()->flush();
        return redirect('login');
    }

    public function updateProfile(Request $request) {
        
    }
}
