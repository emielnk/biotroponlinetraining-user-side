@extends ('layouts.dashboardloggedin')
@section('page_heading','Availible Online Training')
@section('section')

    <!-- @if(session()->get('user_telah_ikut'))
    <script type="text/javascript">
        $(function() {
            $('#myModals').modal('show');
        });
    </script>
    @endif -->

    <style>
    body, html {
        height: 100%;
    }

    .bg {
        /* The image used */
        background-image: url("http://previews.123rf.com/images/smithore/smithore1009/smithore100900016/7812712-ulva-seagrass-closeup-with-many-bubbles-Stock-Photo.jpg");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>

    @foreach($list as $listtrain)
        <div class="jumbotron">
            <div class="container" align="center">
                <h1>{{ $listtrain->nama_training }}</h1>
                <p>{{ $listtrain->deskripsi_training }}</p>
                    <ul>
                        <p><li>Date Start:  <strong>{{ $listtrain->tanggal_mulai }}</strong></li></p> 
                        <p><li>Date End  :  <strong>{{ $listtrain->tanggal_akhir }}</strong></li></p>
                    </ul>
                    @if((session()->get('user_telah_ikut')===session('id_loggedin_user')) && (session()->get('di_training')=== $listtrain->id_training))
                   <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModals">You've applying this training</button>       
                    @else
                    <p><a class="btn btn-primary btn-lg" href="registertraining/formjoin/{{ (session()->get('id_loggedin_user')) }}/{{ $listtrain->id_training }}" role="button">Apply This Training</a></p>
                    @endif
            </div>
        </div>
    @endforeach
    <div id="myModals" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">You've applying this training</h4>
            </div>
            <div class="modal-body">
                <p>Please Wait For Confirmations from SEAMEO BIOTROP</p>
                <p>Please Check Your Email For Notifications<p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
@stop
