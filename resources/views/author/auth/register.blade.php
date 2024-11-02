@extends('author.layouts.auth', ['title' => 'Registration'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 col-xl-8">
            <div class="card mt-4" id="authorRegCard" style="top:250px;">

                <div class="card-body p-4">
                    
                    <div class="text-center mb-3">
                        <span><img src="{{ asset('img/logo.png') }}" alt="" height="58"></span>
                        <h3>Author Registration</h3>
                    </div>

                    @if (count($errors))
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Error validating data.<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('author.register') }}" method="POST" class="pt-2">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-2 mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            </div>

                            <div class="col-md-5 mb-3">
                                <label for="firstname">First Name</label>
                                <input class="form-control @error('firstname') is-invalid @enderror" type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" 
                                    placeholder="Enter your firstname" required autocomplete="firstname" autofocus>
                            </div>

                            <div class="col-md-5 mb-3">
                                <label for="lastname">Last Name</label>
                                <input class="form-control @error('lastname') is-invalid @enderror" type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" 
                                    placeholder="Enter your lastname" required autocomplete="lastname">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="email">Email Address</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required 
                                    placeholder="Enter your email" autocomplete="email">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email">Phone Number</label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="number" id="phone" name="phone" value="{{ old('phone') }}" required 
                                    placeholder="Enter your phone number" autocomplete="phone">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="dob" class="col-form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city" class="col-form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="state" class="col-form-label">State</label>
                                <select class="form-control" name="state" id="state" required>
                                    <option value="">- - - - Select State - - -</option>
                                    @foreach ($locations as $item)
                                        <option value="{{ $item->state }}" @selected($item->state == old('state'))>{{ $item->state }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="zip" class="col-form-label">Zip/Postal Code</label>
                                <input type="number" class="form-control" id="zip" name="zip" value="{{ old('zip') }}" required>
                            </div>
                        
                            <div class="col-md-6 mb-3">
                                <label for="password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Enter your password" required
                                    autocomplete="new-password">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password-confirm">Confirm Password</label>
                                <input class="form-control" type="password" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signup" required>
                            <label class="custom-control-label" for="checkbox-signup">I accept the <a href="{{ route('tandc') }}" class="text-dark" target="_blank">Terms and Conditions</a></label>
                        </div>

                        <div class="form-group">
                            {!! htmlFormSnippet() !!}
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

@push('custom-scripts')
<script>
    $(document).ready(function(){ 
        var input_group = $('input[required]').parent();
        input_group.find('label').addClass('required');
        var select_group = $('select[required]').parent();
        select_group.find('label').addClass('required');
    });
</script>
@endpush
