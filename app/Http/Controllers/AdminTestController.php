<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;

use App\Models\Test;
use App\Models\QuestionTest;
use App\Models\OptionTest;

use App\Models\Evaluasi;
use App\Models\QuestionEval;
use App\Models\OptionEval;

class AdminTestController extends Controller
{
  public function shownewtest($id_train)
  {
    $training = Training::find($id_train);
    $test = new Test;
    $test -> id_training = $training-> id_training;
    $test -> save();

    return view('admin.test.newtest', ['train'=>$training, 'test'=>$test]);
  }

  public function savequestiontest(Request $request)
  {
    // dd($request);
    $count = count($request->question);

    for($i=0; $i<$count; $i++)
    {
      $newquestion = new QuestionTest;
      $newquestion -> id_test = $request -> id_test;
      $newquestion -> questions = $request -> question[$i] ;
      $newquestion -> save();

      $newanswer1 = new OptionTest;
      $newanswer1 -> id_question = $newquestion -> id_question ;
      $newanswer1 -> option      = $request-> answer1[$i]       ;
      $newanswer1 -> save();

      $newanswer2 = new OptionTest;
      $newanswer2 -> id_question = $newquestion -> id_question ;
      $newanswer2 -> option      = $request-> answer2[$i]       ;
      $newanswer2 -> save();

      $newanswer3 = new OptionTest;
      $newanswer3 -> id_question = $newquestion -> id_question ;
      $newanswer3 -> option      = $request-> answer3[$i]       ;
      $newanswer3 -> save();

      $newanswer4 = new OptionTest;
      $newanswer4 -> id_question = $newquestion -> id_question ;
      $newanswer4 -> option      = $request-> answer4[$i]       ;
      $newanswer4 -> save();
    }

    return redirect()->action(
          'TestController@showdone', ['id_test' => $request->id_test]
      );
  }

  public function showdone($id_test)
  {
      // dd($id_test);
      $question = QuestionTest::where('id_test',$id_test)->get();
      $option = OptionTest::all();
      // dd($id_test, $question, $option);

      return view('admin.test.test',['quest'=>$question, 'option'=>$option]);
  }

  public function showtest($id_training, $id_test)
  {
      // dd($id_test);
      $question = QuestionTest::where('id_test',$id_test)->get();
      $option = OptionTest::all();
      // dd($question, $option);

      return view('admin.test.test',['quest'=>$question, 'option'=>$option]);
  }

  public function addnewquestion($id_training, $id_test)
  {
    return view('admin.test.newquestion', ['id_train'=>$id_training, 'id_test'=>$id_test]);
  }


  public function editquestion($id_test,$id_question)
  {
      $question = QuestionTest::where('id_question',$id_question)->get();
      $option = OptionTest::where('id_question',$id_question)->get();
      $caritraining = test::where('id_test',$id_test)->get();
      foreach ($question as $quest) {}
      foreach ($caritraining as $cari) {
        $id_train = $cari->id_training;
      }
      // dd($id_train);
      return view('admin.test.editquestion',['quest'=>$quest, 'option'=>$option, 'id_training'=>$id_train]);

  }

  public function updatequestion(Request $request)
  {
    $question = QuestionTest::where('id_question',$request->id_question)->get();
    foreach ($question as $quest) {}
    $quest->questions = $request->question;
    $quest -> save();

    $answer = OptionTest::where('id_option',$request->id_answer1)->get();
    foreach ($answer as $answer1) {}
    $answer1->option = $request->answer1;
    $answer1->save();

    $answer = OptionTest::where('id_option',$request->id_answer2)->get();
    foreach ($answer as $answer2) {}
    $answer2->option = $request->answer2;
    $answer2->save();

    $answer = OptionTest::where('id_option',$request->id_answer3)->get();
    foreach ($answer as $answer3) {}
    $answer3->option = $request->answer3;
    $answer3->save();

    $answer = OptionTest::where('id_option',$request->id_answer4)->get();
    foreach ($answer as $answer4) {}
    $answer4->option = $request->answer4;
    $answer4->save();

    // dd($request);
    return redirect(route('showtest',['id_training'=>$request->id_training,'id_test'=>$request->id_test]));

  }

  public function destroyquestion($id_test,$id_question)
  {
    $question = QuestionTest::destroy('id_question',$id_question);
    $answer = OptionTest::destroy('id_question',$id_question);

    return redirect()->back();
  }


}
