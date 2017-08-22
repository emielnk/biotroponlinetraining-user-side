@extends('layouts.dashboardloggedin')
@section('page_heading','Learning Source')
@section('section')
    <div class="panel panel-default">
        <div class="panel" align="center">
        @if(session('status'))
            <a href="#myModals" data-toggle="modal" data-target="#myModals"class="btn btn-danger">You've attendance</a>
        @else
            <a href="/absen/{{ session()->get('id_loggedin_user') }}/{{$id}}" class="btn btn-primary">Absence in day</a>
        @endif
        </div>
        <div class="panel-heading">
            <h3 class="panel-title">Your Learning Resource fo this Course</h3>
        </div>
        <div class="panel-body" align="center">
            @foreach($bahans as $bahan)
                <iframe width="420" height="315" src="{{ $bahan->nama_bahan }}"></iframe>
                <br>
            @endforeach
        </div>
    </div>

    <div id="myModals" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">You've absence for this course</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
@stop