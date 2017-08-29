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
        // dd($user);
        return view('userprofile', ['user' => $user]);
    }

    public function update(Request $req) {

    }

    public function update_photo(Request $request) {
        $this->validate($request, [
            'avatar' => 'dimensions:min_width=200,min_height=300'
       ]);
       $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
       $request->image_file->move(public_path('images'), $imageName);
    }
}
