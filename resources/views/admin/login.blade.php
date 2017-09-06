@extends ('layouts.plane')
@section ('body')
<div class="col-md-6 col-md-offset-3">

	<h1 class="page-header">Login Admin Biotrop Online Training</h1>

	<form method="post" action="{{action('UserController@checkLogin')}}">
		{{ csrf_field() }}
		@if (
			(count($errors) > 0 ) || (session('status') == 'salah')
		)

		<p class="text-danger">
			Maaf Username atau Password anda salah!
		</p>

		@endif

		<label>email</label>
		<div class="form-group">
			<input type="text" name="email" class="form-control" required>
		</div>

		<label>Password</label>
		<div class="form-group">
			<input type="password" name="password" class="form-control" required>
		</div>

		<button type="submit" class="btn btn-block btn-primary">Login</button>

	</form>
</div>

@stop
