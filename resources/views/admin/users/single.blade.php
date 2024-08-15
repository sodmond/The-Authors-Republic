@extends('admin.layouts.main', ['title' => ucwords($book->title), 'activePage' => 'users'])

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
                                <li class="breadcrumb-item"><a href="{{ route('admin.books') }}">Books</a></li>
                                <li class="breadcrumb-item active">My books</li>
                            </ol>
                        </div>
                        <h4 class="page-title">My books</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">Single Book Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <a class="btn btn-custom" href="{{ route('admin.books') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-info" href="{{ route('admin.book.edit', ['id' => $book->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                    <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid" src="{{ asset('storage/'.$book->image) }}" alt="Book Cover Image">
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Title</th>
                                                <td>{{ $book->title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Category</th>
                                                <td>{{ ucwords(\App\Models\Book::getCategoryName($book->category_id)) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Price</th>
                                                <td>{{ $book->price }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date Created</th>
                                                <td>{{ $book->created_at }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12 my-3">
                                    <strong>Description</strong>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr>
                                                <td><?php echo Illuminate\Support\Facades\Storage::get('books/contents/'.$book->description); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <a class="btn btn-lg btn-success" href="{{ route('admin.book.download', ['book_file' => $book->book_file]) }}" target="_blank">
                                        <i class="fas fa-download"></i> Download Book File</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection