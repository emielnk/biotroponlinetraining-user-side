@extends('layouts.dashboard')
@section('page_heading','Pre-Test & Post-Test')
@section('section')

<div class="col-md-12 col-lg-12">
    <a href="./showtest/newquestion"><button style="margin-bottom:20px"type="button" class="btn btn-primary" name="Pertemuan Baru">Tambah Pertanyaan</button></a>
</div>



@if($quest)
@foreach($quest as $question)
<div class="col-lg-12 col-md-4">
    <div class="thumbnail">
        <div class="caption">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('destroyquestion',['id_test'=>$question->id_test,'id_question' => $question->id_question]) }}"><button style="margin:5px; float:right" type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Delete</button></a>
                    <a href="{{ route('editquestion',['id_test'=>$question->id_test,'id_question' => $question->id_question]) }}"><button style="margin:5px; float:right" class="btn btn-success">Edit</button></a>
                    <h2>{{$question -> questions}}</h2>

                </div>
            </div>
            <p>
              <ol type="A">
              @foreach($option as $opt)
                @if($question->id_question == $opt->id_question)
                  <li>{{$opt->option}}</li>
                @endif
              @endforeach</p>
            </ol>
        </div>
    </div>
</div>
@endforeach
@endif



@stop
