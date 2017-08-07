@extends('layouts.plane')
@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">Biotrop Online Training</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url ('userprofile')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url ('login') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
              </ul>





            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('') }}"><i class="fa fa-home fa-fw"></i> Home </a>
                        </li>

                        <li >
                            <a href="#"><i class="fa fa-book fa-fw"></i> Training <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*newtraining') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('newtraining') }}">New Training</a>
                                </li>
                                <li {{ (Request::is('*listtraining') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('listtraining' ) }}">List Training</a>
                                </li>
                                <li {{ (Request::is('*listpemohon') ? 'class="active"' : '') }}>
                                    <a href="{{ url('listpemohon') }}">List Pemohon</a>
                                </li>
                            </ul>
                        </li>

                        <li {{ (Request::is('*evaluasi') ? 'class="active"' : '') }}>
                            <a href="{{ url ('evaluasi') }}"><i class="fa fa-thumbs-o-up fa-fw"></i> Evaluasi </a>
                        </li>


                        <li {{ (Request::is('*listuser') ? 'class="active"' : '') }}>
                            <a href="{{ url ('listuser') }}"><i class="fa fa-user fa-fw"></i> User </a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


        <div id="page-wrapper">
			      <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      			<div class="row">
      				@yield('section')
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop
