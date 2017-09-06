@extends('layouts.dashboard')
@section('page_heading','List Training')
@section('section')

<div class="row">
  <div class="container">
    <div class="col-lg-12">
        <table id="listtraining" class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Training</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Deskripsi</th>
                    <th>Banyak Pertemuan</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tbody>
                  @foreach ($list as $listtrain)
                  <tr>
                        <td><a href="listtraining/show/{{ $listtrain->id_training }}"> {{ $listtrain->nama_training }} </a> </td>
                        <td> {{ $listtrain->tanggal_mulai }} </td>
                        <td> {{ $listtrain->tanggal_akhir }} </td>
                        <td> {!! substr($listtrain->deskripsi_training,0,50) !!}....  </td>
                        <td> {{ $listtrain->banyak_pertemuan }} </td>
                        <td><a href="listtraining/{{ $listtrain->id_training }}/edit"><button class="btn btn-success">Edit</button></a>
					                  <a href="listtraining/destroy/{{ $listtrain->id_training }}"><button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Delete</button></a> </td>
                    </tr>
                  @endforeach
                </tbody>

        </table>
    </div>
</div>
</div>
@stop
