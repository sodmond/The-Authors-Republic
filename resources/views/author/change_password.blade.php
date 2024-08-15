@extends('author.layouts.main', ['title' => 'Change Password', 'activePage' => 'account'])

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Change Password</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="header-title">Change Your Password</h4>
                        <p class="sub-header">
                            Secure your account by changing your password if it seems compromised.
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

                        <form method="POST" action="{{ route('author.profile.password.update') }}">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="current-password" class="col-form-label">Current Password</label>
                                <input type="password" class="form-control" id="current-password" name="old_password">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">New Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password" class="col-form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="password_confirmation">
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