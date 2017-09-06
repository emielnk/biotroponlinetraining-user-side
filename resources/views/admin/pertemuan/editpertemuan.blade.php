@extends('layouts.dashboard')
@section('page_heading','Edit Training')
@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
        <form method="POST" action="{{ route('updatepertemuan', ['id_training'=>$judul->id_training, 'id_pertemuan'=> $temuan->id_pertemuan]) }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
              <label>Nama Training</label>
              <p class="form-control-static">{{$judul->nama_training}}</p>
          </div>

          <div class="form-group">
              <label>Tanggal Pelaksanaan</label>
              <input name="tanggal_pelaksanaan" class="form-control" type="text" value="{{ $temuan->tanggal_pelaksanaan }}">
          </div>

          <div class="form-group">
              <label>Deskripsi Pertemuan</label>
              <textarea name="deskripsi_pertemuan" class="form-control" rows="3">{!! $temuan->deskripsi_pertemuan !!}</textarea>
          </div>

          <div class="form-group">
              <label>File Bahan Ajar</label>
              <input name="filebahan" id="filebahan" class="file" type="file">
          </div>

            <button name="submit" value="update" type="submit" class="btn btn-success">Submit Button</button>
            <button type="reset" class="btn btn-danger">Reset Button</button>
        </form> <br>
    </div>
</div>
</div>


@stop
