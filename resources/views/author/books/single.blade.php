@extends('author.layouts.main', ['title' => ucwords($book->title), 'activePage' => 'books'])

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
                                <li class="breadcrumb-item"><a href="{{ route('author.home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('author.books') }}">Books</a></li>
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
                                    <a class="btn btn-custom" href="{{ route('author.books') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-info" href="{{ route('author.book.edit', ['id' => $book->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                    <a class="btn btn-danger" href="#" id="deleteBookBtn"><i class="fa fa-trash"></i> Delete</a>
                                    <input type="hidden" id="deleteBookUrl" value="{{ route('author.book.trash', ['id' => $book->id]) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="img-fluid" src="{{ ($book->image != '') ? asset('storage/'.$book->image) : asset('img/image-370x500.jpg') }}" alt="Book Cover Image">
                                    <div>
                                        @if($book->featured == 0)
                                            <span class="bg-danger px-2 py-1 text-white rounded mr-3">Not Featured</span>
                                        @else
                                            <span class="bg-success px-2 py-1 text-white rounded mr-3">Featured</span>
                                        @endif
                                    </div>
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
                                                <td>{{ number_format($book->price) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Soft Copy</th>
                                                <td>{{ ($book->soft_copy == 1) ? 'Yes' : 'No' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Hard Copy</th>
                                                <td>{{ ($book->hard_copy == 1) ? 'Yes' : 'No' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Stock Availability</th>
                                                <td>{{ number_format($book->stock) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pages Number</th>
                                                <td>{{ number_format($book->pages_number) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Published Date</th>
                                                <td>{{ $book->published_at }}</td>
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
                                    @if(!empty($book->book_file))
                                        <a class="btn btn-lg btn-success" href="{{ route('author.book.download', ['book_file' => $book->book_file]) }}" target="_blank">
                                            <i class="fas fa-download"></i> Download Book File</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@push('custom-scripts')
    <script>
        $('#deleteBookBtn').click(function() {
            var x = confirm('Do you want to delete this book?');
            if (x == true) {
                var url = $('#deleteBookUrl').val();
                window.location.href = url;
            }
        });
    </script>
@endpush