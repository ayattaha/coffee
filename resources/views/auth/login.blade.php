@extends('layouts.test')

@section('content')
<div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
            @csrf  
            <h1>Login Form</h1>
              <div>
              <input id="email" placeholder="User name" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
             @enderror
            </div>
              <div>
              <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
              <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
                  @enderror
              </div>
              <div>
              <button type="submit" class="btn btn-default submit">Log in</button>
               
                @if (Route::has('password.request'))
                <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
                @endif
            </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="to_register"> Create Account </a>
                @endif    
            </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i> Beverages Admin</h1>
                  <p>©2016 All Rights Reserved. Beverages Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

@endsection