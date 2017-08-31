<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\Test;
use App\Models\UserAnswerPost;
use App\Models\UserAnswerPre;
use App\Models\QuestionTest;
use App\Models\OptionTest;
use App\Models\Kunci;
use App\Models\NilaiTest;


class TestController extends Controller
{
    public function currentUser() {
        return session()->get('id_loggedin_user');
    } 

    public function saveUserAnswerPost(Request $req, int $id_test) {
        // dd($id_test);
        $quests = $this->getQuestion($id_test);
        // dd(sizeof($quests));
        $arr = [];
        $i = 0;
        $benar = 0;
        foreach($quests as $quest){
            $arr[$i] = $quest->id_question;
            $i++;
        }
        $answer = $req->request;
        $count = count($req->request) - 2;
        for($i=0; $i<$count; $i++) {
            $userAns = new UserAnswerPost;
            $answerindex = 'answer-'. $arr[$i];
            $userAns->id_test = (int)$req->id_test;
            $userAns->id_user = $this->currentUser();
            $userAns->id_question = $arr[$i];
            $userAns->answer = $req->request->get($answerindex);
            $jawabannya = $userAns->answer;
            if($this->cekBenar($jawabannya, $userAns->id_question)) {
                $userAns->nilai = true;
            }
            else {
                $userAns->nilai = false;
            }
            $userAns->save();
        }
        $savetonilai = $this->getUserNilaiPost($id_test);
        $final = new NilaiTest;
        $final->id_user = $this->currentUser();
        $final->id_test = $id_test;
        $final->jenis_test = 'postest';
        $final->nilai = $savetonilai;
        $final->save();
        return redirect()->action('RegisTrainingController@showavalible');
    }


    public function saveUserAnswerPre(Request $req, int $id_test) {
        $quests = $this->getQuestion($id_test);
        $arr = [];
        $i = 0;
        $benar = 0;
        foreach($quests as $quest){
            $arr[$i] = $quest->id_question;
            $i++;
        }
        $answer = $req->request;
        $count = count($req->request) - 2;
        for($i=0; $i<$count; $i++) {
            $userAns = new UserAnswerPre;
            $answerindex = 'answer-'. $arr[$i];
            $userAns->id_test = (int)$req->id_test;
            $userAns->id_user = $this->currentUser();
            $userAns->id_question = $arr[$i];
            $userAns->answer = $req->request->get($answerindex);
            $jawabannya = $userAns->answer;
            if($this->cekBenar($jawabannya, $userAns->id_question)) {
                $userAns->nilai = true;
            }
            else {
                $userAns->nilai = false;
            }
            $userAns->save();
        }
        $savetonilai = $this->getUserNilaiPre($id_test);
        $final = new NilaiTest;
        $final->id_user = $this->currentUser();
        $final->id_test = $id_test;
        $final->jenis_test = 'pretest';
        $final->nilai = $savetonilai;
        $final->save();
        return redirect()->action('RegisTrainingController@showavalible');
    }

    public function getUserNilaiPre(int $id_test) {
        $jawaban = UserAnswerPre::where('id_user', $this->currentUser())
                                    ->where('id_test', $id_test)
                                    ->where('nilai', 1)->count();
        $soal = QuestionTest::where('id_test', $id_test)->count();
        // dd($soal);
        $nilai = ($jawaban/$soal)*100;
        $finalRes = round($nilai,2);
        return $finalRes;
    }

    public function getUserNilaiPost(int $id_test) {
        $jawaban = UserAnswerPost::where('id_user', $this->currentUser())
                                    ->where('id_test', $id_test)
                                    ->where('nilai', 1)->count();
        $soal = QuestionTest::where('id_test', $id_test)->count();
        // dd($soal);
        $nilai = ($jawaban/$soal)*100;
        $finalRes = round($nilai,2);
        return $finalRes;
    }

    public function getOption() {
        $options = OptionTest::all();
        return $options;
    }

    public function getQuestion($id) {
        $quests = QuestionTest::where('id_test', $id)->get();
        return $quests;
    }

    public function getPreTest(int $id_training) {
        if(!($this->cekKuis($id_training))) {
            Session::flash('takadasoal', "This Training Doesnt Have Test");
            return redirect()->back();
        }
        $currentTest = Test::where('id_training', $id_training);
        $test = $currentTest->select('id_test')->first();
        $id_test = $test['id_test'];
        $question = $this->getQuestion($id_test);
        $options = $this->getOption();
        return view('pretest', ['questions' => $question, 'options' => $options, 'id_test' => $id_test]);
    }

    public function getPostTest(int $id_training) {
        if(!($this->cekSudahPre($id_training))){
            Session::flash('ikutpre', "Please Do Pretest First");
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        if(!($this->cekKuis($id_training))) {
            Session::flash('takadasoal', 'This Training Dont Have Quest');
            return redirect()->back();
        }
        $currentTest = Test::where('id_training', $id_training);
        $test = $currentTest->select('id_test')->first();
        $id_test = $test['id_test'];
        $question = $this->getQuestion($id_test);
        $options = $this->getOption();
        return view('postest', ['questions' => $question, 'options' => $options, 'id_test' => $id_test]);
    }

    public function cekSudahPre(int $id_training) {
        $currentTest = Test::where('id_training', $id_training);
        $test = $currentTest->select('id_test')->first();
        $id_test = $test['id_test'];
        $isExist = NilaiTest::where('id_user', $this->currentUser())
                            ->where('id_test', $id_test)
                            ->where('jenis_test', 'pretest')
                            ->exists();
        // dd($isExist);
        return $isExist;
    }

    public function hitungNilai(int $benar, int $jumlahSoal) {
        $res = ($benar/$jumlahSoal)*100;
        $finalRes = round($res,2);
        return $finalRes;
    }

    public function cekBenar(string $jawaban, int $id_question) {
        $kunci = Kunci::where('id_question', $id_question);
        $key = $kunci->select('kunci')->first();
        if($jawaban == $key['kunci']) {
            return true;
        }
    }

    public function cekKuis($id_training) {
        $currentTest = Test::where('id_training', $id_training);
        $test = $currentTest->select('id_test')->first();
        $id_test = $test['id_test'];
        $soalIsExists = QuestionTest::where('id_test',$id_test)->exists();
        return $soalIsExists;
    }
}
