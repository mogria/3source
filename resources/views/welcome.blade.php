@extends('layouts.master')
@section('content')
<div class="title">Laravel 5</div>
<div id="trailer">
    <marquee class="pan"><<<   <    < </marquee>
    <marquee class="pan">   <<<   <   </marquee>
    <marquee class="pan"><  <   <<<  <</marquee>
    <marquee class="pan"> <<  <<   <<<</marquee>
</div>
<div id="login">
    @include('errors.form', ['errors' => $errors ])
    <form action="{{ URL::action('Auth\AuthController@postLogin') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="txtUsername">Username</label>
            <input name="name" type="text" class="form-control" id="txtUsername" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="txtPassword">Password</label>
            <input name="password" type="password" class="form-control" id="txtPassword" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="chkRemember">Remember me</label>
            <input type="checkbox" name="remember" id="chkRemember">
        </div>
        <button type="submit" class="btn btn-default">Login</button>
        Don't have an account? <a href="{{ URL::to('/register') }}">register</a>.
    </form>
</div>
@endsection
