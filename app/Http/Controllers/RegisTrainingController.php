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
        // $partisipans = Partisipan::all();
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
            session()->flash('existUser', "you've been Applying");
            return $this->showavalible();
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
        $partisipan->status = null;
        $partisipan->current_research = $req->recentResearch;
        $partisipan->published_works = $req->recentPublishedWork;
        $partisipan->recent_attended = $req->recentAttended;
        $partisipan->tujuan_ikut = $req->reasonForJoin;
        $partisipan->use_learning = $req->useTheLearning;
        //dd($partisipan);
    }

    public function isPartisipanExist($id, $id_training) {
        $isExist = Partisipan::where('id_user',63)->exists() && Partisipan::where('id_training',2)->exists();
        // dd($isExist);
        if($isExist) {
            return true;
        }
        else{
            return false;
        }
    }
}
