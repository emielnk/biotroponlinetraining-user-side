@extends('layouts.dashboard')
@section('page_heading','New Pengumuman')
@section('section')
<div class="col-sm-12">
<div class="row">
  <div class="col-lg-12">
      <form method="POST" action="{{route('savepengumuman')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
              <label>Pengumuman</label>
              <textarea name="isi_pengumuman" class="form-control" rows="5"></textarea>
          </div>

          <button name="submit" value="save" type="submit" class="btn btn-success">Submit Button</button>
            <button type="reset" class="btn btn-danger">Reset Button</button>
        </form> <br>
    </div>
</div>
</div>


@stop
