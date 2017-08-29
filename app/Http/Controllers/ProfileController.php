<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAnswerPre;
use App\Models\UserAnswerPost;
use App\Models\Partisipan;

class ProfileController extends Controller
{
    public function index() {
        $id = session()->get('id_loggedin_user');
        $user = User::find($id);
        dd($user);
    }
}
