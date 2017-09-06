<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\TerimaTraining;
use App\Mail\TolakTraining;
use Validator;
use App\Models\User;
use App\Models\Training;
use App\Models\Partisipan;
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

  public function daftartraining()
  {
      $training = Training::all();
      return view('admin.user.pemohontraining',['train'=>$training]);
  }

  public function showpemohon($id_training)
  {
    $caripemohon = Partisipan::where('id_training',$id_training)->get();
    $Pemohon = Partisipan::where('id_training',$id_training);
    $cariiduser = $Pemohon->select('id_user')->get();

    $count = $cariiduser->count();
    for ($i=0; $i < $count; $i++) {
      $namauser[$i] = user::where('id_user',$cariiduser[$i]->id_user)->get();
    }

    $data = DB::table('Partisipan')
            ->join('user', 'Partisipan.id_user', '=', 'user.id_user')
            ->select('user.nama', 'Partisipan.*')
            ->get();

    return view('admin.user.listpemohon',['pemohon'=>$data]);
  }

  public function terimatraining($id_user)
  {

      $cieketrima = Partisipan::where('id_user',$id_user)->get();
      $statusbaru = 1;

      foreach ($cieketrima as $selamatya) {
        $selamatya -> status = $statusbaru;
        $selamatya -> save();
      }

      $caritraining = training::where('id_training', $selamatya->id_training)->get();

      $user = user::where('id_user',$id_user)->get();
      foreach ($user as $users) {
        $emailuser = $users->email;
        $namauser = $users->nama;
      }

      $data = DB::table('Partisipan')
              ->join('user', 'Partisipan.id_user','=', 'user.id_user')
              ->join('training', 'Partisipan.id_training', '=', 'training.id_training')
              ->select('training.*','user.nama')
              ->where('Partisipan.id_user', $id_user)
              ->get();

      foreach ($data as $datauser) {
      }

      Mail::to($emailuser) -> send(new TerimaTraining($datauser));

      return redirect()->back();
  }

  public function tolaktraining($id_user)
  {
      $cieketolak = Partisipan::where('id_user',$id_user)->get();
      $statusbaru = -1;

      foreach ($cieketolak as $soriya) {
        $soriya -> status = $statusbaru;
        $soriya -> save();
      }

      $user = user::where('id_user',$id_user)->get();
      foreach ($user as $users) {
        $emailuser = $users->email;
        $namauser = $users->nama;
      }

      $data = DB::table('Partisipan')
              ->join('user', 'Partisipan.id_user','=', 'user.id_user')
              ->join('training', 'Partisipan.id_training', '=', 'training.id_training')
              ->select('training.*','user.nama')
              ->where('Partisipan.id_user', $id_user)
              ->get();

      foreach ($data as $datauser) {
      }

      Mail::to($emailuser) -> send(new TolakTraining($datauser));

      return redirect()->back();
  }

  public function showpeserta($id_training)
  {
    $caripemohon = Partisipan::where('id_training',$id_training)->get();
    $Pemohon = Partisipan::where('id_training',$id_training);
    $cariiduser = $Pemohon->select('id_user')->get();

    $count = $cariiduser->count();
    for ($i=0; $i < $count; $i++) {
      $namauser[$i] = user::where('id_user',$cariiduser[$i]->id_user)->get();
    }

    $data = DB::table('Partisipan')
            ->join('user', 'Partisipan.id_user', '=', 'user.id_user')
            ->select('user.nama', 'Partisipan.*')
            ->where('Partisipan.status','=','1')
            ->get();

    // dd($data);
    return view('admin.training.listpeserta',['peserta'=>$data]);
  }


}
