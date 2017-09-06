@extends('layouts.dashboardloggedin')
@section('section')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

            $("#avatar").change(function(){
                readURL(this);
            }); 	
        });
    </script>
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        #img-upload{
            width: 100%;
        }
    </style>
    @if(Session::has('updated'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}" align="center">{{ Session::get('updated') }}</p>
    @endif
    <ul class="nav nav-pills">
        <li class="active"><a href="#formEdit" data-toggle="tab">Home</a></li>
        <li><a href="#pretestinfo" data-toggle="tab">My PreTest Info</a></li>
        <li><a href="#postestinfo" data-toggle="tab">My PosTest Info</a></li>
    </ul>

    <div class="tab-content clearfix">
        <div class="tab-pane active" id="formEdit">
            <div class="col-lg-6">
                <form method="post" action="userprofile/save">
                    <h2> Update Your Profile </h2>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Full Name</label>
                                <input class="form-control" name = "namaupdate" placeholder="{{ $user->nama }}" value="{{ $user->nama }}" autofocus required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>email</label>
                                <input class="form-control" name = "emailupdate" placeholder="{{ $user->email }}" value="{{ $user->email }}" autofocus required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Telephone Number</label>
                                <input class="form-control" name = "teleponupdate" placeholder="{{ $user->no_telepon }}" value="{{ $user->no_telepon }}" autofocus required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{ csrf_field() }}
                </form>
            </div>

            <div class="col-lg-6">
                
                <form method="POST" action="/update_photo" enctype="multipart/form-data">
                    <div class="col-sm-4">
                        <div class="kv-avatar center-block text-center" style="width:200px">
                            <strong>Your Pass Photo</strong>
                            @if($user->avatar === NULL)
                            <img id="img-upload" height="250" width="200">
                            @else
                            <img src="{{ $user->avatar }}" height="250" width="200">
                            @endif
                            <br><br>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        Change... <input id="avatar" name="avatar" type="file" class="file-loading" required>
                                    </span>
                                </span>
                                <input type="text" class="form-control" readonly>
                            </div>                   
                            <div class="help-block"><small>Select file < 1500 KB</small></div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            {{ csrf_field() }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="tab-pane" id="pretestinfo">
            <table id="infopretest" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Training</th>
                        <th>Nilai Pretest</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($nilaipre as $nilai)
                    <tr>
                        <td>{{ $nilai->nama_training }}</td>
                        <td> <strong>{{ $nilai->nilai }}</strong> </td>
                        @if($nilai->nilai < 70)
                        <td>Not Pass</td>
                        @else
                        <td>Pass</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="tab-pane" id="postestinfo">
            <table id="infopostest" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Training</th>
                        <th>Nilai Postest</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($nilaipos as $nilai)
                    <tr>
                        <td>{{ $nilai->nama_training }}</td>
                        <td> <strong>{{ $nilai->nilai }}</strong> </td>
                        @if($nilai->nilai < 70)
                        <td>Not Pass</td>
                        @else
                        <td>Pass</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    <div>
@stop
