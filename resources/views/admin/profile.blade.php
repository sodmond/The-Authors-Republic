@extends('layouts.user', ['title' => 'My Profile', 'activePage' => 'account'])

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
                                <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
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

                        <form method="POST" action="{{ route('user.profile.update') }}">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="firstname" class="col-form-label">Firstname</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ Auth::user()->firstname }}" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-form-label">Lastname</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ Auth::user()->lastname }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"  value="{{ Auth::user()->email }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary my-3">Update</button>
                        </form>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->

    

</div>
@endsection