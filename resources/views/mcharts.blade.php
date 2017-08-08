@extends ('layouts.dashboardloggedin')
@section('page_heading','Availible Online Training')
@section('section')
<div class="col-sm-12">
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
                                    <div class="huge"> 
										
										
									</div> <!--Dynamic dari database-->
                                    <div>Jumlah Pertemuan</div>
                                </div>
                            </div>
                        </div>
                          	<a href="#">
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
                                    <div class="huge">12</div> <!--Dynamic dari database-->
                                    <div>Jumlah Peserta Training</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('listuser') }}">
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
          		
          		@endsection
          		@include('widgets.panel', array('class'=>'primary', 'header'=>true, 'as'=>'panel2'))
            </div>

@stop
	
	<!--<div class="row">
		<div class="col-sm-6">
			@section ('cchart1_panel_title','Line Chart')
			@section ('cchart1_panel_body')
			@include('widgets.charts.clinechart')
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart1'))
			@section ('cchart3_panel_title','Donut Chart')
			@section ('cchart3_panel_body')
				<div style="max-width:400px; margin:0 auto;">@include('widgets.charts.cdonutchart')</div>
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart3'))
		</div>
		<div class="col-sm-6">
			@section ('cchart2_panel_title','Pie Chart')
			@section ('cchart2_panel_body')
				<div style="max-width:400px; margin:0 auto;">@include('widgets.charts.cpiechart')</div>
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart2'))

			@section ('cchart4_panel_title','Bar Chart')
			@section ('cchart4_panel_body')
			@include('widgets.charts.cbarchart')
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cchart4'))
		</div> 
	</div>-->
</div>
@stop
