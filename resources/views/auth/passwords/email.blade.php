@extends('layouts.app', ['activePage' => 'login', 'title' => 'Reset Password'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="tg-sectionhead">
                        <h2><span>Forgot your password?</span>Enter Your Email</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ 'We have emailed your password reset link, pls check your inbox or spam folder for it.' }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="tg-btn tg-active">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <span style="font-size:15px;">Remember your password? 
                                    <a href="{{ route('login') }}">Login here</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
