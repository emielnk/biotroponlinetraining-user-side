<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Training;
use App\Models\Pertemuan;
use App\Models\Bahan;


class TrainingController extends Controller
{

    public function getPertemuan(int $id_training) {
        $pertemuans = Pertemuan::where('id_training', $id_training)->get();
        $training = Training::find($id_training);
        $judulTraining = $training->nama_training;
        // dd($pertemuans);
        $jumlahPertemuanTraining = Pertemuan::where('id_training', $id_training)->count();
        return view('trainingpage', ['pertemuan' => $pertemuans, 'judulTraining' => $judulTraining]);
    } 

    public function getBahan(int $id_pertemuan) {
        $bahans = Bahan::where('id_pertemuan', $id_pertemuan)->get();
        // $pertemuanDate = $bahans->tanggal_pelaksanaan;
        // dd($bahans);
        $currentDay  = $this->getTime();
        return view('bahan', ['bahans' => $bahans]);
        // dd($pertemuanDate);
    }

    public function getTime() {
        $currentTime = date('d-m-Y');
        return $currentTime;
    }

    public function absenPertemuan() {
        
    }
}


