@extends('layouts.dashboard')
@section('page_heading','List User')
@section('section')

<div class="row">
  <div class="container">
      <div class="col-lg-12">
          <table id="listuser" class="table table-striped">
              <thead>
                  <tr>
                      <th>Nama</th>
                      <th>No. Telepon</th>
                      <th>Negara Asal</th>
                      <th>Instansi</th>
                      <th>Pendidikan Terakhir</th>
                      <th>Action</th>
                  </tr>
              </thead>
                  <tbody>

                      <tr>
                          <td>  </td>
                          <td>  </td>
                          <td>  </td>
                          <td>  </td>
                          <td>  </td>
                          <td><a href="#"><button class="btn btn-success">Edit</button></a>
                          <a href="#"><button class="btn btn-danger">Hapus</button></a> </td>
                      </tr>

                  </tbody>

          </table>
      </div>
  </div>
</div>




@stop
