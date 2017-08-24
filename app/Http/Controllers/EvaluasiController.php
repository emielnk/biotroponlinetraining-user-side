<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Evaluasi;
use App\Models\Training;

class EvaluasiController extends Controller
{
    
    public function page($id_training) {
        $trainings = Training::find($id_training);
        $id = $trainings->id_training;
        // dd($id);
        if($this->cekSudahPernah(session()->get('id_loggedin_user'),$id_training))
        {
            return redirect()->action('TrainingController@getPertemuan');
        }
        else
        {
            return view('formevaluasi',['id' => $id]);
        }
    }

    public function cekSudahPernah($id_user, $id_training) {
        $isExists = Evaluasi::where('id_training', $id_training)->where('id_user', $id_user)->exists();
        return $isExists;
    }

    public function saveEval(Request $requset) {
        $eval = new Evaluasi;
        
    }
}
