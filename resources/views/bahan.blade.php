@extends('layouts.dashboard')
@section('page_heading','Blank')
@section('section')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Your Learning Resource fo this Course</h3>
        </div>
        <div class="panel-body" align="center">
            @foreach($bahans as $bahan)
                <video width="616" src="{{ $bahan->nama_bahan }}" controls></video>
                <br>
            @endforeach
        </div>
    </div>
@stop