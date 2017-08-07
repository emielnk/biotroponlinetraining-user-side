<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
Use App\User;
Use APp\user_activation;
use DB;
use Mail;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $this -> validate($request ,[
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'negara' => 'required',
            'agama' => 'required',
            'marital_status' => 'required',
            'id_type' => 'required',
            'nomor_id' => 'required',
            'tanggal_awal_id' => 'required',
            'tanggal_akhir_id' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'telepon' => 'required|numeric',
            'english_profiency' => 'required',
            'alamat' => 'required|max:255',
            'high_degree' => 'required',
            'nama_instansi' => 'required',
            'year_obtained' => 'required',
            'job_pos' => 'required',
            'job_institution' => 'required',
            'job_contact' => 'required|numeric',
            'job_alamat' => 'required',
            'area_interest' => 'required|max:255'
        ]);

        $user = New User;
        $user->nama = $request->nama;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->negara_asal = $request->negara;
        $user->agama = $request->agama;
        $user->marital_status = $request->marital_status;
        $user->id_type = $request->id_type;
        $user->nomor_id = $request->nomor_id;
        $user->tanggal_awal_id = $request->tanggal_awal_id;
        $user->tanggal_akhir_id = $request->tanggal_akhir_id;
        $user->email = $request->email;
        //dd($request);
        $user->password = md5($request->password);
        $user->no_telepon = $request->telepon;
        $user->english_profiency = $request->english_profiency;
        $user->alamat = $request->alamat;
        $user->high_degree = $request->high_degree;
        $user->nama_instansi = $request->nama_instansi;
        $user->year_obtained = $request->year_obtained;
        $user->job_pos = $request->job_pos;
        $user->job_institution = $request->job_institution;
        $user->job_contact = $request->job_contact;
        $user->job_alamat = $request->job_alamat;
        $user->area_interest = $request->area_interest;
        $user->user_activation_code = str_random(30);
        $user->activated = false;
        $user->save();
        //$input = $request->all();
        //$input['user_activation_code'] = str_random(30);
        //$input['activated'] = false;
        /*
        dd($input);
        dd($input['email']);
        $asik = $this->toArray();
        $user['user_activation_code'] = str_random(30);
        DB::table('user_activation')->insert(['email_user'=>$input['email'],'activation_code'=>$input['user_activation_code']]);
        Mail::send('emails.activation', $input, function($message) use ($input) {
            $message->to($input['email'])->subject('Biotrop Activation Code');
        });
        //$userAct = new user_activation;
        */

        Session::flash('message', 'Please check your Email for confirmation'); 
        Session::flash('alert-class', 'alert-info'); 
        return redirect('login');
    }

    public function userActivation($token) {
        $check = DB::table('user_activation')->where('activation_code', $token)->first();
        if(!is_null($check)) {
            $user = User::find($check->id_user);

            if($user->activated == 1) {
                return redirect()->to('login')
                    ->with('success',"Already activated.");
            }

            $user->update(['activated' => 1]);
            DB::table('user_activation')->where('activation_code', $token) -> delete();
                        
            return redirect()->to('login')
                ->with('success',"user active successfully.");
        }
        return redirect()->to('login')
            ->with('warning',"your token is invalid.");
    }

    public function isiEvaluasi() {

    }

}
