@extends('admin.layouts.main', ['title' => 'Author Profile', 'activePage' => 'authors'])

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.authors') }}">Authors</a></li>
                                <li class="breadcrumb-item active">Author Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Author Profile</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Author Profile Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a class="btn btn-custom" href="{{ route('admin.authors') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-primary" href="{{ route('admin.book.edit', ['id' => $author->id]) }}"><i class="fas fa-book"></i> Books</a>
                                    <a class="btn btn-success" href="{{ route('admin.book.edit', ['id' => $author->id]) }}"><i class="fas fa-cart-plus"></i> Sales Order</a>
                                    {{--<a class="btn btn-info" href="{{ route('admin.book.edit', ['id' => $book->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                    <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid" src="{{-- asset('storage/'.$author->image) --}}" alt="Author Profile Picture">
                                    <div>Status: <span class="bg-success text-white py-1 px-2">Active</span></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Title</th>
                                                <td>{{ $author->title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Firstname</th>
                                                <td>{{ $author->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Lastname</th>
                                                <td>{{ $author->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email Address</th>
                                                <td>{{ $author->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>0{{ $author->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of Birth</th>
                                                <td>{{ $author->dob }}</td>
                                            </tr>
                                            <tr>
                                                <th>City</th>
                                                <td>{{ $author->city }}</td>
                                            </tr>
                                            <tr>
                                                <th>State</th>
                                                <td>{{ $author->state }}</td>
                                            </tr>
                                            <tr>
                                                <th>Zipcode</th>
                                                <td>{{ $author->zip }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date Created</th>
                                                <td>{{ $author->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <th>Last Updated</th>
                                                <td>{{ $author->updated_at }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 my-3">
                                    <strong>Bio</strong>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <td><?php #echo Illuminate\Support\Facades\Storage::get('author/contents/'.$author->description); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection