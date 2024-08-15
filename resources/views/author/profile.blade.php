@extends('author.layouts.main', ['title' => 'My Profile', 'activePage' => 'account'])

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('author.home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
                                <li class="breadcrumb-item active">My Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">My Profile</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="header-title">Profile Details</h4>
                        <p class="sub-header">
                            You can modify your profile details below.
                        </p>

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

                        <form method="POST" action="{{ route('author.profile.update') }}">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="title" class="col-form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ Auth::guard('author')->user()->title }}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="firstname" class="col-form-label">Firstname</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ Auth::guard('author')->user()->firstname }}" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="lastname" class="col-form-label">Lastname</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ Auth::guard('author')->user()->lastname }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label">Phone</label>
                                        <input type="number" class="form-control" id="phone" name="phone" value="{{ Auth::guard()->user()->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob" class="col-form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" value="{{ Auth::guard()->user()->dob }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city" class="col-form-label">City</label>
                                        <input type="number" class="form-control" id="city" name="city" value="{{ Auth::guard()->user()->city }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="state" class="col-form-label">State</label>
                                        <input type="number" class="form-control" id="state" name="state" value="{{ Auth::guard()->user()->state }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="zip" class="col-form-label">Zip/Postal Code</label>
                                        <input type="number" class="form-control" id="zip" name="zip" value="{{ Auth::guard()->user()->zip }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bio" class="col-form-label">Bio</label>
                                        <textarea class="form-control" id="bio" name="bio" rows="10">{{ Auth::guard()->user()->bio }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-custom my-3">Update</button>
                        </form>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->

    

</div>
@endsection