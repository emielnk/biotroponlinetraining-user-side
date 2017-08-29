@extends('layouts.dashboardloggedin')
@section('page_heading','Pretest')
@section('section')

<form action="pretest/save/{{ $id_test }}" method="POST">
<input type="hidden" name="id_test" value="{{$id_test}}">
    @foreach($questions as $quests)
        <div class="panel panel-default" id="questions-{{ $quests->id_question }}">
            <div class="panel-body">
                <strong>{{ $quests->question }}</strong> <br>
                <ol type="A">
               
                    @foreach($options as $opt)
                        @if($quests->id_question == $opt->id_question)
                            <li><input type="radio" name="answer-{{ $quests->id_question }}" for="answers-{{ $quests->id_question }}" id="answers-{{ $quests->id_question }}" value="{{ $opt->option }}"/>{{ $opt->option }} </li>
                        @endif
                    @endforeach
              
                </ol>
                <br>
            </div>
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Submit</button>
    {{ csrf_field() }}
</form>
  
@stop