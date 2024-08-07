@extends('author.layouts.auth', ['title' => 'Login'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">

                <div class="card-body p-4">
                    
                    <div class="text-center mb-2">
                        <a href="{{ route('home') }}">
                            <span><img src="{{ asset('img/lg.png') }}" alt="" height="38"></span>
                        </a>
                        <h3>Author Login</h3>
                    </div>

                    <form action="{{ route('author.login') }}" method="POST" class="pt-2">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email address</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" required 
                                value="{{ old('email') }}" placeholder="Enter your email" autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-muted float-right"><small>Forgot your password?</small></a>
                            @endif
                            <label for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" required 
                                placeholder="Enter your password" autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-custom btn-block" type="submit"> Log In </button>
                        </div>

                    </form>

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted mb-0">Don't have an account? <a href="{{ route('author.register') }}" class="text-dark ml-1"><b>Sign Up</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end container -->
@endsection
