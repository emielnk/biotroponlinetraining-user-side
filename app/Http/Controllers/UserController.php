<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;

class UserController extends Controller
{
  function getCurrentUserInfo() {
    $user_id = session()->get('id_loggedin_user');
    $currentUser = User::find($user_id);
    //dd($currentUser);
    return $currentUser;
  }
  
  






}
