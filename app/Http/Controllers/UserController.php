<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;

class UserController extends Controller
{
  function checkLogin(Request $req)
  {
      $validator = Validator::make($req->all(),
      [
            'email' => [
                    'required',
                    'min:3',
                    'exists:user,email'
                  ],

            'password' => [
                    'required',
                    'min:3',
                  ],
      ]);

      if ($validator->fails())
      {
        return redirect('login')
            ->withErrors($validator)
            ->withInput();
      }

      $email= $req->email;
      $password = md5($req->password);

      //dd($email, $password);
      // dd($take);

      $check = user::where('email',$email)->where('password',$password)->count();
      if( !($check > 0) )  {
         return redirect('login')->with('status', 'salah');
      }

      $take = user::where('email',$email)->where('password',$password)->first();

      session(['email' => $take->email]);
      session(['password' => true]);

      return redirect('dashboard');
  }

  function logout(Request $req)
  {
      $req->session()->regenerate();
      $req->session()->flush();

      return redirect('login');
  }

  






}
