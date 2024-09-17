@extends('layouts.app', ['activePage' => 'login', 'title' => 'Login'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="tg-sectionhead">
                        <h2><span>User Login</span>Enter Your Credentials</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    @if (count($errors))
                        <div class="alert alert-danger">
                            <strong class="text-danger">Whoops!</strong> Error validating data.<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">              
                        </div>

                        <div class="form-group">
                            <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="" for="remember">
                                {{ __('Remember Me') }}
                            </span>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-8">
                                <button type="submit" class="tg-btn tg-active">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <span style="font-size:15px;">Don't have an account? 
                                    <a href="{{ route('register') }}">Sign Up</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
