@extends('layouts.dashboard')
@section('page_heading','Pertemuan Baru')
@section('section')

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  


<div class="col-sm-12">
<div class="row">
  <div class="col-lg-6">
      <form method="POST" action="{{ route('savepertemuan') }}" enctype="multipart/form-data" role="form">
        <input type="hidden" name="id_training" value="{{ $cari->id_training }}">

        <span style="background-color:red" font>
          {{ $errors->first('filebahan')}} <br>
        </span>

          <div class="form-group">
              <label>Nama Training</label>
              <p class="form-control-static">{{$cari->nama_training}}</p>
          </div>

          <div>
          <label>Tanggal Pelaksanaan</label>
              <div class="row">
                  <div class="col-sm-5">
                      <div class="form-group">
                          <div class="input-group date" id="datetimepicker">
                              <input class="form-control date" name="tanggal_pelaksanaan" value="{{ old('tanggal_pelaksanaan') }}">
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
              <textarea name="deskripsi_pertemuan" class="form-control" rows="3" required></textarea>
          </div>

          <div class="form-group">
            <label>File Bahan</label>
            <input type="file" name="filebahan" id="filebahan" value="" required>
          </div>

          {{ csrf_field() }}
          <button name="submit" type="submit" class="btn btn-success">Submit Button</button>
          <button type="reset" class="btn btn-danger">Reset Button</button>
        </form> <br>
    </div>
</div>
</div>



<script>
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#filebahan").change(function(){
                readURL(this);
            });
        });
    </script>

@stop
