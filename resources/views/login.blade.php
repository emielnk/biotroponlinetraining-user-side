@extends ('layouts.plane')
@section ('body')

@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}" align="center">{{ Session::get('message') }}</p>
@endif

@if(Session::has('messagesalah'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}" align="center">{{ Session::get('messagesalah') }}</p>
@endif
<style>
    body, html {
        height: 100%;
    }

    .bg {
        /* The image used */
        background-image: url("http://www.magic4walls.com/wp-content/uploads/2014/04/tulips-red-flower-grass-plant-water-green-macro-hd-wallpaper.jpg");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<div class="bg">
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <br /><br /><br />
               @section ('login_panel_title','Please Sign In')
               @section ('login_panel_body')
                        <form role="form" method="POST" action="/loginUser">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" autofocus>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-default btn-primary">Login</button>
                                <a href="/registerpage" class="btn btn-default">Register</a>
                            </fieldset>
                            {{ csrf_field() }}
                        </form>
                    
                @endsection
                @include('widgets.panel', array('as'=>'login', 'header'=>true))
            </div>
        </div>
    </div>
</div>
@stop