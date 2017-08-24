<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\Test;
use App\Models\UserAnswerPost;
use App\Models\UserAnswerPre;
use App\Models\QuestionTest;
use App\Models\OptionTest;


class TestController extends Controller
{
    
    public function getOption(int $id_quest) {
        $options = OptionTest::where('id_question', $id_quest)->get();
        return $options;
    }

    public function getQuestion($id) {
        $quests = QuestionTest::where('id_test', $id)->get();
        $count = count($quests);
        $idquests = [];
        $options = [];
        // dd($count);
        $loopcount = 0;
        foreach($quests as $quest) {
            $idquests[$loopcount] = $quest->id_question;
            $options[$loopcount] = $this->getOption($idquests[$loopcount]);
            $loopcount++;
        }
        dd($options);
        return view('test',['questions' => $questions, 'quests' => $quests]);
    }

    public function getTest(int $id_training) {
        $currentTest = Test::where('id_training', $id_training);
        // dd($test);
        $test = $currentTest->select('id_test')->first();
        $id_test = $test['id_test'];
        $question = $this->getQuestion($id_test);
        // dd($id_test);
    }

    public function saveUserAnswer(Requset $req) {
        
    }

    public function truthIsSoCold() {
        
    }

    public function cekBenar() {
        
    }
}
