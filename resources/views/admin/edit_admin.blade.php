@extends('admin.layouts.main', ['title' => 'Edit Administrator', 'activePage' => 'settings'])

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.settings.home') }}">Settings</a></li>
                            <li class="breadcrumb-item active">Edit Administrator</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Administrator</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
        
        <div class="row">
            <div class="col-12">
                <div class="card shadow my-4">
                    <div class="card-header bg-custom">
                        <h4 class="h5 text-white">Modify Administrator Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-auto">
                                <a class="btn btn-custom" href="{{ route('admin.settings.home') }}">
                                    <i class="fa fa-arrow-circle-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="row">
                            <fieldset class="col">
                                @if (count($errors))
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There are some problems with your input.<br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success"><strong>Success!</strong> {{ session('success') }}</div>
                                @endif
                                <form class="row" action="{{ route('admin.settings.profile.update', ['id' => $admin->id]) }}" method="post">
                                    @csrf
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label class="form-label">Firstname</label>
                                            <input type="text" class="form-control" name="firstname" value="{{ $admin->firstname ?? old('firstname') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label class="form-label">Lastname</label>
                                            <input type="text" class="form-control" name="lastname" value="{{ $admin->lastname ?? old('lastname') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $admin->email ?? old('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-group">
                                            <label class="form-label">Role</label>
                                            <select class="form-control" name="role" id="role" required>
                                                <option value=""> - - - Choose Admin Role - - - </option>
                                                @foreach ($adminRoles as $role)
                                                    <option value="{{ $role->id }}" @selected($admin->role == $role->id)>{{ $role->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-custom w-100">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        @if(auth('admin')->id() == 1)
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow my-4">
                    <div class="card-header bg-custom">
                        <h4 class="h5 text-white">Change Password</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.settings.profile.password', ['id' => $admin->id]) }}">
                            @csrf
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
                    </div>
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>
        @endif
    </div>
</div>
@endsection