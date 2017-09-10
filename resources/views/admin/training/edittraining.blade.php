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
        <form method="POST" action="{{ route('updatetraining', ['id_training'=> $cari->id_training]) }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>Nama Training </label>
                <input name="nama_training" class="form-control" type="text", value="{{$cari->nama_training}}" required>
            </div>
            <div>
            <label>Date Start</label>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker">
                                <input class="form-control date" name="tanggal_mulai" value="{{$cari->tanggal_mulai}}">
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
        <div>
        <label>Date End</label>
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker">
                            <input class="form-control date" name="tanggal_akhir" value="{{ $cari->tanggal_akhir }}">
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
