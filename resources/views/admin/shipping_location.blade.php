@extends('admin.layouts.main', ['title' => 'Edit Shipping Location', 'activePage' => 'settings'])

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.settings.shipping') }}">Shipping Locations</a></li>
                            <li class="breadcrumb-item active">Edit Shipping Location</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Settings</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-custom">
                        <h4 class="h5 text-white">Edit Shipping Location</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <a class="btn btn-custom" href="{{ route('admin.settings.shipping') }}">
                                    <i class="fa fa-arrow-circle-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                                <form class="row" action="" method="post">
                                    @csrf
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">State</label>
                                            <input type="text" class="form-control" name="state" value="{{ $shipping_location->state }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Fee</label>
                                            <input type="number" class="form-control" name="fee" value="{{ $shipping_location->fee }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="1" @selected($shipping_location->status == true)>Active</option>
                                                <option value="0" @selected($shipping_location->status == false)>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-custom w-100">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection