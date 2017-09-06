<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAnswerPre;
use App\Models\UserAnswerPost;
use App\Models\NilaiTest;
use App\Models\Partisipan;


class ProfileController extends Controller
{
    public function index() {
        $id = session()->get('id_loggedin_user');
        $user = User::find($id);
        $infoPre = $this->getUserNialiPre();
        $infoPos = $this->getUserNialiPost();
        // dd($user);
        return view('userprofile', ['user' => $user, 'nilaipre' => $infoPre, 'nilaipos'=> $infoPos]);
    }

    public function update(Request $req) {
        $update = User::find(session()->get('id_loggedin_user'));
        $this->validate($req, [
            'namaupdate' =>'required|max:40',
            'emailupdate' => 'email|required',
            'teleponupdate' => 'numeric|required'
        ]);
        $update->nama = $req->namaupdate;
        $update->email = $req->emailupdate;
        $update->no_telepon = $req->teleponupdate;
        $update->save();
        Session::flash('updated', 'Your profile updated');
        return redirect()->back();
    }

    public function update_photo(Request $request) {
        // $request = $request->get('avatar');
        // dd($request);
        $user = User::find(session()->get('id_loggedin_user'));
        $file = $request->file('avatar');
        // dd($file);
        $this->validate($request, [
            'avatar' => 'image|mimes:jpeg,png,jpg|max:1024'
        ]);
        $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
        // dd($imageName);
        $request->avatar->move(public_path('images/'), $imageName);
        $user->avatar = 'images/'. $imageName;
        $user->save();
        return redirect()->back();
    }

    public function getUserNialiPre() {
        $data = DB::table('nilai_test')
                ->join('test', 'nilai_test.id_test','=','test.id_test')
                ->join('training', 'test.id_test','=','training.id_training')
                ->select('nilai_test.*', 'training.nama_training')
                ->where('jenis_test','pretest')
                ->where('id_user', session()->get('id_loggedin_user'))
                ->get();
        // dd($data);
        return $data;
    }
    public function getUserNialiPost() {
        $data = DB::table('nilai_test')
                ->join('test', 'nilai_test.id_test','=','test.id_test')
                ->join('training', 'test.id_training','=','training.id_training')
                ->select('nilai_test.*', 'training.nama_training')
                ->where('jenis_test','postest')
                ->where('id_user', session()->get('id_loggedin_user'))
                ->get();
        // dd($data);
        return $data;
    }
}
