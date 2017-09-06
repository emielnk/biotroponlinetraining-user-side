@extends ('layouts.dashboardloggedin')
@section('page_heading','Pertemuan')
@section('section')


@if(Session::has('ikutpre'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" align="center">{{ Session::get('ikutpre') }}</p>
@endif
@if(Session::has('mohonmaaf'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" align="center">{{ Session::get('mohonmaaf') }}</p>
@endif
@if(Session::has('takadasoal'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" align="center">{{ Session::get('takadasoal') }}</p>
@endif
<div id="myModals" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">You've done this test</h4>
            </div>
            <div class="modal-body">
                <p>Thank You</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{$judulTraining}}</h3>
        </div>
        <div class="panel-body">
        <div class="panel panel-default">
            @if($nilaipre != null)
                <div class="panel-heading">
                    <a href="#myModals" data-toggle="modal" ><h3 class="panel-title">Pretest</h3></a>
                </div>
                <div class="panel-body">
                    <p><strong>Your Mark: {{ $nilaipre }}</strong>
                </div>
            @else
                <div class="panel-heading">
                    <a href="/pretest/{{ $train->id_training }}"><h3 class="panel-title">Pretest</h3></a>
                </div>
                <div class="panel-body">
                    
                </div>
            @endif
            </div>
            <!-- panel dalam panel -->
            @foreach($pertemuan as $pertem)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/trainingpage/bahan/{{$pertem->id_pertemuan}}"><h3 class="panel-title">{{$pertem->tanggal_pelaksanaan}}</h3></a>
                </div>
                <div class="panel-body">
                    {{$pertem->deskripsi_pertemuan}}
                </div>
            </div>
            @endforeach
            <div class="panel panel-default">
            @if($nilaipost != null)
                <div class="panel-heading">
                    <a href="#myModals" data-toggle="modal"><h3 class="panel-title">Postest</h3></a>
                </div>
                <div class="panel-body">
                    <p><strong>Your Mark: {{ $nilaipost }}</strong>
                </div>
            @else
                <div class="panel-heading">
                    <a href="/postest/{{ $train->id_training }}"><h3 class="panel-title">Postest</h3></a>
                </div>
                <div class="panel-body">
                    
                </div>
            @endif
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/evaluasi/{{$id}}"><h3 class="panel-title">Evaluasi</h3></a>
                </div>
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
    
@stop