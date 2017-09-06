@extends('layouts.dashboard')
@section('page_heading','Edit Training')
@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
        <form method="POST" action="{{ route('updatetraining', ['id_training'=> $cari->id_training]) }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>Nama Training </label>
                <input name="nama_training" class="form-control" type="text", value="{{$cari->nama_training}}" required>
            </div>
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input name="tanggal_mulai" class="form-control" type="text", value="{{$cari->tanggal_mulai}}" required>
            </div>
            <div class="form-group">
                <label>Tanggal Akhir</label>
                <input name="tanggal_akhir" class="form-control" type="text", value="{{$cari->tanggal_akhir}}" required>
            </div>
            <div class="form-group">
                <label>Deskripsi Training</label>
                <textarea name="deskripsi_training" class="form-control" rows="3" required>{{$cari->deskripsi_training}}</textarea>
            </div>
            <div class="form-group">
                <label>Banyak Pertemuan</label>
                <input name="banyak_pertemuan" class="form-control" type="text", value="{{$cari->banyak_pertemuan}}" required>
            </div>

            <button name="submit" value="update" type="submit" class="btn btn-success">Submit Button</button>
            <button type="reset" class="btn btn-danger">Reset Button</button>
        </form> <br>
    </div>
</div>
</div>


@stop
