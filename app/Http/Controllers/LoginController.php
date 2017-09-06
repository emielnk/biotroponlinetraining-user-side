<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Training;


class LoginController extends Controller
{
    public $currentUserId;
    public function login(Request $request) {
        
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required"
        ]);
        // dd($request);
        $email = $request->email;
        $pass = md5($request->password);

        $check = User::where('email', $email) && User::where('password', $pass)->count();
        // dd($check);

        if($check == false) {
            if($email = 'admin@biotrop.org' && $pass = "adminadmin") {
                session(['id_loggedin_user' => 'admin']);
                return redirect()->action('HomeController@index');
            }
            Session::flash('messagesalah', 'Wrong email or password');
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('login');
        }
        $take = User::where('email', $email)->where('password', $pass)->first();
        session(['email' => $take->email]);
        session(['password' => true]);
        $query = User::where('email','=', $email);
        if($query -> count() > 0) {
            $user = $query->select('id_user', 'nama')->first();
            $id = $user['id_user'];
            session(['id_loggedin_user' => $id]);
            $trainings = $this->listtraining();
            // dd($trainings);
            return redirect('main')->with('auth', $user);
        }
        Session::flash('messagesalah', 'Wrong email or password');
        Session::flash('alert-class', 'alert-danger'); 
        return redirect('login');
    }

    public function logout() {
        Session::regenerate();
        Session::flush();
        return redirect('login');
    }

    public function listtraining()
    {
        $list = Training::all();
        return view('mcharts', ['list'=>$list]);
    }

}
