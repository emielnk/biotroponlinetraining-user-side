<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partisipan;
use App\Models\Training;
use App\Models\User;

class RegisTrainingController extends Controller
{
    public function showavalible() {
        $trainings = Training::all();
        // $partisipants = Partisipan::where('id_user', session()->get('id_loggedin_user'));
        // $partisipans = Partisipan::all();
        // session(['user_telah_ikut' => true]);
        return view('main', ['list' => $trainings]);
    }

    public function registertrainingView($id_currentuser, $id_currenttraining) {
        $gettraining = Training::find($id_currenttraining);
        // $arrayGetTraining[] = $gettraining;
        // dd($arrayGetTraining); 
        if(!($this->isPartisipanExist($id_currentuser, $id_currenttraining))) {
            return view('registraining', ['get' => $gettraining]);
        }
        else {
            // session()->flash('existUser', "you've been Applying");
            if($this->isAccepted($id_currentuser, $id_currenttraining)) {
                return redirect()->action('TrainingController@getPertemuan', ['id_training' => (int)$id_currenttraining]);
            }
            else{
                // $session['telah_ikut'] = ()$id_currentuser;
                session(['user_telah_ikut' => (int)$id_currentuser]);
                session(['di_training' => (int)$id_currenttraining]);
                // dd(session()->get('di_training'));
                // dd(session()->get('user_telah_ikut'));
                // dd(session()->get('id_loggedin_user'));
                // dd(session()->all());
                return redirect('main');
            }
        }
    }
    
    public function registertraining(Request $req, $id_currenttraining) {
        $this->validate($req, [
            'recentResearch'=>'max:500',
            'recentPublishedWorks' => 'max:500',
            'recentAttended' => 'max:500',
            'reasonForJoin' => 'required|max:500',
            'useTheLearnings' => 'required|max:500',
        ]);
        
        $partisipan = New Partisipan;
        $partisipan->id_training = $id_currenttraining;
        $partisipan->id_user = session()->get('id_loggedin_user');
        $partisipan->status = 0;
        $partisipan->current_research = $req->recentResearch;
        $partisipan->published_works = $req->recentPublishedWorks;
        $partisipan->recent_attended = $req->recentAttended;
        $partisipan->tujuan_ikut = $req->reasonForJoin;
        $partisipan->use_learning = $req->useTheLearnings;
        $partisipan->save();
        return redirect('main');
        // dd($partisipan);
    }

    public function isPartisipanExist($id_user, $id_training) {
        $isExist = Partisipan::where('id_user', $id_user)->where('id_training', $id_training)->exists();//->exists() && Partisipan::where('id_training',2)->exists();
        // dd($isExist);
        return $isExist;
    }

    public function isAccepted($id_user, $id_training) {
        $isAccepted = Partisipan::where('id_user', $id_user)->where('id_training', $id_training)->where('status', 1)->exists();
        // dd($isAccepted);
        return $isAccepted;
    }

    public function cekPartisipan() {
        $id_user = session()->get('id_loggedin_user');
        
    }
}
