@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="text-center mb-4">
  <a href="/">
    <img src="{{ asset('assets/images/logo-dark.png') }}" height="30" alt="Logo">
  </a>
</div>

<form method="POST" action="{{ route('login') }}">
  @csrf

  <div class="form-group">
    <label>Email address</label>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>

  <div class="form-group form-check">
    <input type="checkbox" name="remember" class="form-check-input" id="remember">
    <label class="form-check-label" for="remember">Remember me</label>
  </div>

  <div class="text-center">
    <button class="btn btn-primary btn-block" type="submit">Login</button>
  </div>
</form>

<div class="text-center mt-3">
  <p class="text-muted">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
</div>
@endsection
