<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Training;
use App\Models\Pertemuan;


class TrainingController extends Controller
{

    public function getPertemuan(int $id_training) {
        $pertemuans = Pertemuan::where('id_training', $id_training)->get();
        $jumlahPertemuanTraining = Pertemuan::where('id_training', $id_training)->count();
        return view('trainingpage', ['pertemuan' => $pertemuans]);
    } 
}


