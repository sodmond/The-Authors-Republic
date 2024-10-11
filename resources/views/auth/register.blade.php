@extends('layouts.app', ['activePage' => 'register', 'title' => 'Register'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="tg-sectionhead">
                        <h2><span>User Registration</span>Fill in Your Credentials</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tg-aboutus">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    @if (count($errors))
                        <div class="alert alert-danger" role="alert">
                            <strong class="text-danger">Whoops!</strong> Error validating data.<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname" class="col-form-label">{{ __('Firstname') }}</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname" class="col-form-label">{{ __('Lastname') }}</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="col-form-label">{{ __('Phone Number') }}</label>
                                    <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                </div>             
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>               
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="" type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }} required>
                                    <span class="" for="terms">
                                        {{ __('I agree to the ') }}<a href="{{ route('tandc') }}" class="text-dark" target="_blank">Terms & Conditions</a>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-8 offset-md-4">
                                <div class="form-group">
                                    <button type="submit" class="tg-btn tg-active">
                                        {{ __('Sign Up') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row" class="mb-3">
                            <div class="col-md-12">
                                <span style="font-size:15px;">Already have an account? 
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
