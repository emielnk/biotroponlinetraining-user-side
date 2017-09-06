@extends('layouts.dashboard')
@section('page_heading','Pertemuan Baru')
@section('section')
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

          <div class="form-group">
              <label>Tanggal Pelaksanaan</label>
              <input name="tanggal_pelaksanaan" class="form-control" type="text" required>
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
