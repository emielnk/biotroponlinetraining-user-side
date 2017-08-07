@extends('layouts.dashboard')
@section('page_heading','New Training')
@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
        <form role="form" action="action">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>Nama Training </label>
                <input class="form-control" placeholder="Enter text">
            </div>
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input class="form-control" placeholder="Enter text">
            </div>
            <div class="form-group">
                <label>Tanggal Akhir</label>
                <input class="form-control" placeholder="Enter text">
            </div>
            <div class="form-group">
                <label>Deskripsi Training</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label>Banyak Pertemuan</label>
                <input class="form-control" placeholder="Enter text">
            </div>









            <button type="submit" class="btn btn-success">Submit Button</button>
            <button type="reset" class="btn btn-danger">Reset Button</button>
        </form>
    </div>
</div>
</div>


@stop
