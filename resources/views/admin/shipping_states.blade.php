@extends('admin.layouts.main', ['title' => 'Shipping Locations', 'activePage' => 'settings'])

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.settings.home') }}">Settings</a></li>
                                <li class="breadcrumb-item active">Shipping Locations</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Shipping Locations</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            
            <div class="row" id="adminList">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">List of Shipping Locations</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <a class="btn btn-custom" href="{{ route('admin.settings.home') }}">
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
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>State</th>
                                                    <th>Fee (₦)</th>
                                                    <th>Status</th>
                                                    <th>Last Updated</th>
                                                    <th>...</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                                @foreach ($shipping_locations as $location)
                                                    <tr>
                                                        <td>{{ $row++ }}</td>
                                                        <td>{{ $location->state }}</td>
                                                        <td>{{ number_format($location->fee, 2) }}</td>
                                                        <td>
                                                            @if($location->status == 1) 
                                                                <small class="bg-success text-white py-1 px-2 rounded">Active</small>
                                                            @else
                                                                <small class="bg-danger text-white py-1 px-2 rounded">Inactive</small>
                                                            @endif
                                                        </td>
                                                        <td>{{ $location->updated_at }}</td>
                                                        <td>
                                                            <a class="btn btn-info btn-xs" href="{{ route('admin.settings.shipping.edit', ['id' => $location->id]) }}">
                                                                <i class="fa fa-edit"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col-auto">
                                            {{ $shipping_locations->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->

    </div> <!-- content -->

    

</div>
@endsection