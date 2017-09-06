@extends('layouts.dashboard')
@section('page_heading','Daftar Pemohon Training')
@section('section')

<div class="row">
  <div class="container">
      <div class="col-lg-8">
          <table id="listpemohontraining" class="table table-striped">
              <thead>
                  <tr>
                      <th>Nama Training</th>
                      <th>Action</th>
                  </tr>
              </thead>
                  <tbody>

                    @foreach($train as $training )
                    <tr>
                          <td>{{$training->nama_training}}  </td>
                          <td> <a href="{{route('listpemohon', ['id_training'=>$training->id_training])}}"><button type="button" name="lihatpemohon" class="btn btn-primary">Lihat Pemohon</button></a></td>
                      </tr>
                      @endforeach
                  </tbody>
          </table>
      </div>
  </div>
</div>


@stop
