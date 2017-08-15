@extends ('layouts.dashboard')
@section('page_heading','Pertemuan')
@section('section')

    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{$judulTraining}}</h3>
        </div>
        <div class="panel-body">
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
        </div>
    </div>
    
@stop