@extends('layouts.dashboardloggedin')
@section('section')

            
<div class="col-sm-12">
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="userprofile/save">
                <h2> Update Your Profile </h2>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Full Name</label>
                            <input class="form-control" name = "nama" placeholder="{{ $user->nama }}" value="{{ old('nama') }}" autofocus required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>email</label>
                            <input class="form-control" name = "nama" placeholder="{{ $user->email }}" value="{{ old('nama') }}" autofocus required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Telephone Number</label>
                            <input class="form-control" name = "nama" placeholder="{{ $user->no_telepon }}" value="{{ old('nama') }}" autofocus required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <img src="{{ $user->avatar }}">
            <form>
                <input type="file" name="avatar" id="avatar">
                <div>
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    {{ csrf_field() }}
                </div>
            </form>
        </div>
    </div>
</div>
@stop
