@extends('layouts.test')

@section('content')
<div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('register') }}">
            @csrf  
            <h1>Create Account</h1>
            <div class="mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Fullname" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
           <!-- 
            <div class="mb-3">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" required>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            -->
            <div class="mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div>
                <button type="submit" class="btn btn-default submit">Submit</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">Already a member ?
                    <a href="{{ route('login') }}" class="to_register"> Log in </a>
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