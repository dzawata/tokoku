@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="page-content page-auth">
  <div class="section-store-auth" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center row-login">
        <div class="col-lg-6 text-center">
          <img src="/images/login-placeholder.png" alt="" class="w-50 mb-4 mb-lg-none" />
        </div>
        <div class="col-lg-5">
          <h2>
            Belanja kebutuhan utama, <br />
            menjadi lebih mudah
          </h2>

          <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" />

          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-4" :errors="$errors" style="color: red;" />

          <form method="POST" action="{{ route('login') }}" class="mt-3">
            @csrf

            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control w-75" name="email" aria-describedby="emailHelp" :value="old('email')" required autofocus />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" id="password" name="password" class="form-control w-75" required autocomplete="current-password" />
            </div>
            <button class="btn btn-success btn-block w-75 mt-4" type="submit">
              Sign In to My Account
            </button>
            <a class="btn btn-signup w-75 mt-2" href="{{ route('register') }}">
              Sign Up
            </a>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection