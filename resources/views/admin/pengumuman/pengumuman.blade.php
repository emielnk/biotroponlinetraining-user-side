@extends('layouts.dashboard')
@section('page_heading','Pengumuman')
@section('section')


<div class="col-md-12 col-lg-12">
    <a href="./newpengumuman"><button style="margin-bottom:20px"type="button" class="btn btn-primary" name="Pertemuan Baru">Tambah Pengumuman</button></a>
    <a href="./pengumuman/edit"><button style="margin-bottom:20px"type="button" class="btn btn-primary" name="Pertemuan Baru">Edit Pengumuman</button></a>
</div>


<div class="col-md-12">
  @section ('panel2_panel_title', 'Pengumuman')
  @section ('panel2_panel_body')
        {!!$pengumuman->isi_pengumuman!!}
  @endsection
  @include('widgets.panel', array('class'=>'primary', 'header'=>true, 'as'=>'panel2'))
</div>

@stop
