@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div class="text-center mb-4">
  <a href="/">
    <img src="{{ asset('assets/images/logo-dark.png') }}" height="30" alt="Logo">
  </a>
</div>

<form method="POST" action="{{ route('register') }}">
  @csrf

  <div class="form-group">
    <label>Full Name</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Email address</label>
    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control" required>
  </div>

  <div class="text-center">
    <button class="btn btn-success btn-block" type="submit">Register</button>
  </div>
</form>

<div class="text-center mt-3">
  <p class="text-muted">Already have an account? <a href="{{ route('login') }}">Login</a></p>
</div>
@endsection
