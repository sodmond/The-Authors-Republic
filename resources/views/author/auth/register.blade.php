@extends('author.layouts.auth', ['title' => 'Registration'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 col-xl-8">
            <div class="card mt-4" style="top:100px; bottom:50px;">

                <div class="card-body p-4">
                    
                    <div class="text-center mb-3">
                        <span><img src="{{ asset('img/logo.png') }}" alt="" height="58"></span>
                        <h3>Author Registration</h3>
                    </div>

                    <form action="{{ route('author.register') }}" method="POST" class="pt-2">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 mb-3">
                                <label for="firstname">First Name</label>
                                <input class="form-control @error('firstname') is-invalid @enderror" type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" 
                                    placeholder="Enter your firstname" required autocomplete="firstname" autofocus>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lastname">Last Name</label>
                                <input class="form-control @error('lastname') is-invalid @enderror" type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" 
                                    placeholder="Enter your lastname" required autocomplete="lastname">
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 mb-3">
                                <label for="email">Email Address</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required 
                                    placeholder="Enter your email" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Phone Number</label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="number" id="phone" name="phone" value="{{ old('phone') }}" required 
                                    placeholder="Enter your phone number" autocomplete="phone">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Enter your password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm">Confirm Password</label>
                            <input class="form-control" type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signup" required>
                            <label class="custom-control-label" for="checkbox-signup">I accept the <a href="{{ route('tandc') }}" class="text-dark" target="_blank">Terms and Conditions</a></label>
                        </div>
                        
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-custom btn-block" type="submit"> Sign Up </button>
                        </div>

                    </form>

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted mb-0">Already have account?  <a href="{{ route('author.login') }}" class="text-dark ml-1"><b>Sign In</b></a></p>
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
