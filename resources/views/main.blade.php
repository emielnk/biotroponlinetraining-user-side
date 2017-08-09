@extends ('layouts.dashboardloggedin')
@section('page_heading','Availible Online Training')
@section('section')

<!--<div class="row">
  <div class="container">
    <div class="col-lg-12">
        <table id="showavalible" class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Training</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Deskripsi</th>
                    <th align='center'>Banyak Pertemuan</th>
                    <th>Join</th>        
                </tr>
            </thead>
                <tbody>
                  @foreach ($list as $listtrain)
                  <tr>
                        <td><a href="listtraining/show/{{ $listtrain->id_training }}"> {{ $listtrain->nama_training }} </a> </td>
                        <td> {{ $listtrain->tanggal_mulai }} </td>
                        <td> {{ $listtrain->tanggal_akhir }} </td>
                        <td> {!! substr($listtrain->deskripsi_training,0,50) !!}....  </td>
                        <td align="center"> {{ $listtrain->banyak_pertemuan }} </td>
                        @if(session('existUser'))
                            <td>You've been applying, please wait for confirmation</td>
                        @else
                            <td><a href="registertraining/formjoin/{{ session()->get('id_loggedin_user') }}/{{$listtrain->id_training}}"><button class="btn btn-success">Join in This Training</button></a></td>
                        @endif
                    </tr>
                  @endforeach
                </tbody>

        </table>
    </div>
</div>-->
<div class="panel panel-default">
  <div class="panel-body">
    Panel content
  </div>
  <div class="panel-footer">Panel footer</div>
</div>

@stop
