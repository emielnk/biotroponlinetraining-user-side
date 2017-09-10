<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Training;
use App\Models\Pertemuan;
use App\Models\Bahan;
use App\Models\Partisipan;
use App\Models\UserAnswerPre;
use App\Models\UserAnswerPost;
use App\Models\Test;
use App\Models\QuestionTest;

class TrainingController extends Controller
{

    public function getPertemuan(int $id_training) {
        if($this->cekSudahTerima($id_training)) {
            $pertemuans = Pertemuan::where('id_training', $id_training)->get();
            $training = Training::find($id_training);
            $bahan = Bahan::all();
            $jumlahPertemuanTraining = Pertemuan::where('id_training', $id_training)->count();
            $test = Test::where('id_training', $id_training)->first();
            // dd($test);
            $id_test = $test->id_test;
            $judulTraining = $training->nama_training;
            $id = $training->id_training;
            // dd($pertemuans);
            if($this->cekSudahIkutPre($id_test)) {
                session(['sudah_pre' => true]);
                $nilaipre = $this->getUserNilaiPre($id_test);
            }
            else {
                $nilaipre = null;
            }
            if($this->cekSudahIkutPost($id_test)) {
                session(['sudah_post' => true]);
                $nilaipost = $this->getUserNilaiPost($id_test);
            }
            else {
                $nilaipost = null;
            }
            return view('trainingpage', ['bahan'=>$bahan, 'nilaipost' => $nilaipost,'nilaipre' => $nilaipre,'train' => $training,'pertemuan' => $pertemuans, 'judulTraining' => $judulTraining, 'id' => $id]);
        }
        else {
            return redirect()->action('RegisTrainingController@showavalible');
        }
    } 

    public function getUserNilaiPre(int $id_test) {
        $jawaban = UserAnswerPre::where('id_user', session()->get('id_loggedin_user'))
                                ->where('id_test', $id_test)
                                ->where('nilai', 1)->count();
        $soal = QuestionTest::where('id_test', $id_test)->count();
        // dd($soal);
        $nilai = ($jawaban/$soal)*100;
        $finalRes = round($nilai,2);
        return $finalRes;
    }

    public function cekBenar(string $jawaban, int $id_question) {
        $kunci = Kunci::where('id_question', $id_question);
        $key = $kunci->select('kunci')->first();
        if($jawaban == $key['kunci']) {
            return true;
        }
    }

    public function getUserNilaiPost(int $id_test) {
        $jawaban = UserAnswerPost::where('id_user', session()->get('id_loggedin_user'))
                                 ->where('id_test', $id_test)->where('nilai', 1)->count();
        $soal = QuestionTest::where('id_test', $id_test)->count();
        // dd($soal);
        $nilai = ($jawaban/$soal)*100;
        $finalRes = round($nilai,2);
        return $finalRes;
    }

    public function getBahan(int $id_pertemuan) {
        $bahans = Bahan::where('id_pertemuan', $id_pertemuan)->get();
        if($this->checkTanggal($id_pertemuan)){
            return view('bahan', ['bahans' => $bahans, 'id' => $id_pertemuan]);
        }
        else {
            Session::flash('mohonmaaf', 'Cannot attempt now');
            return redirect()->back();
        }
    }

    public  function cekSudahTerima(int $id_training) {
        $isExists = Partisipan::where('id_user', session()->get('id_loggedin_user'))
                              ->where('id_training', $id_training)
                              ->where('status', 1)->exists();
        // dd($isExists);
        return $isExists;
    }

    public function cekSudahIkutPre(int $id_test) {
        $testnya = Test::find($id_test);
        $isExist = UserAnswerPre::where('id_user', session()->get('id_loggedin_user'))
                                ->where('id_test', $id_test)->exists();
        return $isExist;
    }

    public function cekSudahIkutPost(int $id_test) {
        $isExist = UserAnswerPost::where('id_user', session()->get('id_loggedin_user'))
                                 ->where('id_test', $id_test)->exists();
        return $isExist;
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


