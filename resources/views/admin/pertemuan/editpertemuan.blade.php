@extends('layouts.dashboard')
@section('page_heading','Edit Training')
@section('section')


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  

<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
        <form method="POST" action="{{ route('updatepertemuan', ['id_training'=>$judul->id_training, 'id_pertemuan'=> $temuan->id_pertemuan]) }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
              <label>Nama Training</label>
              <p class="form-control-static">{{$judul->nama_training}}</p>
          </div>

          <div>
          <label>Tanggal Pelaksanaan</label>
              <div class="row">
                  <div class="col-sm-5">
                      <div class="form-group">
                          <div class="input-group date" id="datetimepicker">
                              <input class="form-control date" name="tanggal_pelaksanaan"  require value="{{ $temuan->tanggal_pelaksanaan }}">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                              </span>
                              <script type="text/javascript">
                                  $('.date').datepicker({  
                                      format: 'mm-dd-yyyy'  
                                  });                  
                              </script>  
                          </div>
                      </div>
                  </div>
              </div>
            </div>


          <div class="form-group">
              <label>Deskripsi Pertemuan</label>
              <textarea name="deskripsi_pertemuan" class="form-control" rows="3" require>{!! $temuan->deskripsi_pertemuan !!}</textarea>
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
