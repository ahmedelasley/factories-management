@extends('layouts.guest')


@section('content')

<div class="register-box" style="width: 30rem;">
    <!-- /.register-logo -->
    <div class="card card-outline card-primary" >
      <div class="card-header">
        <a href="#" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover" >
          <h1 class="mb-0"><b>Admin</b>LTE</h1>
        </a>
      </div>
      <div class="card-body register-card-body">
        <p class="register-box-msg">Register a new membership</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
          <div class="input-group mb-1">
              <div class="input-group-text"><span class="bi bi-person"></span></div>
            <div class="form-floating">
                <input id="registerFullName" type="text" class="form-control" name="name" value="{{old('name')}}" required autofocus autocomplete="name"/>
              <label for="registerFullName">{{ __('Full Name') }}</label>
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
          <div class="input-group mb-1">
              <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            <div class="form-floating">
              <input id="registerEmail" type="email" class="form-control" name="email" :value="{{old('email')}}" required autocomplete="username"  />
              <label for="registerEmail">{{ __('Email') }}</label>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
          <div class="input-group mb-1">
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            <div class="form-floating">
              <input id="registerPassword" type="password" class="form-control" name="password" required autocomplete="new-password" />
              <label for="registerPassword">{{ __('Password') }}</label>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
          <div class="input-group mb-1">
              <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            <div class="form-floating">
              <input id="registerPassword" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
              <label for="registerPassword">{{ __('Confirm Password') }}</label>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>

          <!--begin::Row-->
          <div class="row">
            <div class="col-8 d-inline-flex align-items-center">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!--end::Row-->
        </form>
        <div class="social-auth-links text-center mb-3 d-grid gap-2">
          <p>- OR -</p>
          <a href="#" class="btn btn-primary">
            <i class="bi bi-facebook me-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-danger">
            <i class="bi bi-google me-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->
        <p class="mb-0">
          <a href="#" class="link-primary text-center"> I already have a membership </a>
        </p>
      </div>
      <!-- /.register-card-body -->
    </div>
  </div>
  <!-- /.register-box -->
    @endsection
