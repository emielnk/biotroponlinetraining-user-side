<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Training;
use App\Models\Pertemuan;
use App\Models\Bahan;
use App\Models\Partisipan;


class TrainingController extends Controller
{

    public function getPertemuan(int $id_training) {
        if($this->cekSudahTerima($id_training)) {
            $pertemuans = Pertemuan::where('id_training', $id_training)->get();
            $training = Training::find($id_training);
            $judulTraining = $training->nama_training;
            $id = $training->id_training;
            // dd($pertemuans);
            $jumlahPertemuanTraining = Pertemuan::where('id_training', $id_training)->count();
            return view('trainingpage', ['pertemuan' => $pertemuans, 'judulTraining' => $judulTraining, 'id' => $id]);
        }
        else {
            return redirect()->action('RegisTrainingController@showavalible');
        }
    } 

    public function getBahan(int $id_pertemuan) {
        $bahans = Bahan::where('id_pertemuan', $id_pertemuan)->get();
        if($this->checkTanggal($id_pertemuan)){
            return view('bahan', ['bahans' => $bahans, 'id' => $id_pertemuan]);
        }
        else {
            return redirect()->action('RegisTrainingController@showavalible');
        }
    }

    public  function cekSudahTerima(int $id_training) {
        $isExists = Partisipan::where('id_user', session()->get('id_loggedin_user'))->where('id_training', $id_training)->where('status', 1)->exists();
        // dd($isExists);
        return $isExists;
    }

    public function checkTanggal(int $id_pertemuan) {
        $pertemuan = Pertemuan::find($id_pertemuan);
        $tanggalPertemuan = $pertemuan->tanggal_pelaksanaan;
        // dd($tanggalPertemuan);
        $today = date('d-m-Y');
        // dd($today);
        if($tanggalPertemuan == $today) {
            return true;
        }
        else{
            return false;
        }
    }

    public function YoutubeID($url)
    {
        if(strlen($url) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
            {
                return $match[1];
            }
            else
                return false;
        }
        return $url;
    }
}


