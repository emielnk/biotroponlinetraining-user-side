@extends('layouts.dashboardloggedin')
@section('page_heading','Evaluation Form')
@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="POST" action="createeval">
                    <div class="form-group">
                        <label>Your Name</label>
                        <input class="form-control">
                        <p class="help-block">Optional</p>
                    </div>
                    <div class="form-group">
                        <label>Agency/Institution</label>
                        <input class="form-control">
                        <p class="help-block">Optional</p>
                    </div>
                    <div>
                        <label></label>
                        <input>
                        <p class="help-block"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop