@extends('layouts.dashboard')
@section('page_heading')
{{ $cari->nama_training }}
@endsection
@section('section')


            <!-- /.row -->
          <div class="col-sm-12">
            <div class="row">

                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-word-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"> {{ $cari->banyak_pertemuan }}</div> <!--Dynamic dari database-->
                                    <div>Jumlah Pertemuan</div>
                                </div>
                            </div>
                        </div>
                          <a href="{{ route('detailtraining', ['id_training'=> $cari->id_training]) }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$jumlahpeserta}}</div> <!--Dynamic dari database-->
                                    <div>Jumlah Peserta Training</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('pesertatraining', ['id_training'=> $cari->id_training]) }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              @section ('panel2_panel_title', 'Deskripsi Training')
          		@section ('panel2_panel_body')
          		{!!$cari->deskripsi_training!!}
          		@endsection
          		@include('widgets.panel', array('class'=>'primary', 'header'=>true, 'as'=>'panel2'))
            </div>










@stop
