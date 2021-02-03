@extends('layouts.app')

@section('content')
    <!-- Login Section Start -->
    <div class="login--section pd--100-0 bg--overlay" data-bg-img="{{asset('assets/img/login-img/bg.jpg')}}">
        <div class="container">
            <!-- Login Form Start -->
            <div class="login--form">
                <div class="title">
                    <h1 class="h1">Login</h1>
                    <p>Welcome back!</p>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </div>

                <form action="{{route('login')}}" method="POST" data-form="validate">
                    @csrf
                    <div class="form-group">
                        <label>
                            <span>Username or Email Address</span>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" required>
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password" class="form-control" required>
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="rememberme">
                            <span>Remember me</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-lg btn-block btn-primary">Log in</button>

                    <p class="help-block clearfix">
                        <a href="#" class="btn-link pull-left">Forgot Username or Password?</a>
                        <a href="#" class="btn-link pull-right">Create An Account</a>
                    </p>
                </form>
            </div>
            <!-- Login Form End -->
        </div>
    </div>
    <!-- Login Section End -->
@endsection