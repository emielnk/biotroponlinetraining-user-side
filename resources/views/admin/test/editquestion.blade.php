@extends('layouts.dashboard')
@section('page_heading','Edit questions')
@section('section')


<form action="{{route('updatequestion',['id_test=>$quest->id_test'])}}" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="id_training" value="{{$id_training}}">
  <input type="hidden" name="id_test" value="{{$quest->id_test}}">
  <div class="container col-lg-12">
    <div id=box>
      <div id="sepaket">
        <div class="row">
          <!-- question -->
          <div class="col-md-6">
            <div class="form-group">
                <label>Question</label>
                <input id="question" name="question" class="form-control" type="text" autofocus value="{{$quest->questions}}">
                <input type="text" name="id_question" value="{{$quest->id_question}}" hidden>
            </div>
          </div>
          <div class="col-md-4">
            <!-- answer 1 -->
            <div class="form-group">
                <label>Answer 1 </label>
                <input id="answer" name="answer1" class="form-control" type="text" value="{{$option[0]->option}}">
                <input type="text" name="id_answer1" value="{{$option[0]->id_option}}" hidden>
            </div>
            <!-- answer 2 -->
            <div class="form-group">
                <label>Answer 2 </label>
                <input id="answer" name="answer2" class="form-control" type="text" value="{{$option[1]->option}}">
                <input type="text" name="id_answer2" value="{{$option[1]->id_option}}" hidden>
            </div>
            <!-- answer 3 -->
            <div class="form-group">
                <label>Answer 3 </label>
                <input id="answer" name="answer3" class="form-control" type="text" value="{{$option[2]->option}}">
                <input type="text" name="id_answer3" value="{{$option[2]->id_option}}" hidden>
            </div>
            <!-- answer 4 -->
            <div class="form-group">
                <label>Answer 4 </label>
                <input id="answer" name="answer4" class="form-control" type="text" value="{{$option[3]->option}}">
                <input type="text" name="id_answer4" value="{{$option[3]->id_option}}" hidden>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>

<button id="submit" style="margin-left:15px; margin-bottom:20px" class="btn btn-success" value="submit" type="submit"> Submit </button>
</form>




@stop
