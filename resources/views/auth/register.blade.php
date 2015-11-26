@extends('layouts.master')
@section('content')
<div id="register">
    Already have an account? <a href="{{ URL::to('/') }}">login</a>.
    @include('errors.form', ['errors' => $errors ])
    <form action="{{ URL::action('Auth\AuthController@postRegister') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="txtUsername">Username</label>
            <input name="name" type="text" class="form-control" id="txtUsername" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="txtEmail">Email</label>
            <input name="email" type="text" class="form-control" id="txtEmail" placeholder="e-Mail Address">
        </div>
        <div class="form-group">
            <label for="txtPassword">Password</label>
            <input name="password" type="password" class="form-control" id="txtPassword" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="txtPasswordConfirmation">Password Confirmation</label>
            <input name="password_confirmation" type="password" class="form-control" id="txtPasswordConfirmation" placeholder="Password, again :-)">
        </div>

        <button type="submit" class="btn btn-default">Register</button>
    </form>
</div>
@endsection
