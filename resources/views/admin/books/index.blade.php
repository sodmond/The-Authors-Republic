@extends('admin.layouts.main', ['title' => 'Books', 'activePage' => 'books'])

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
                                <li class="breadcrumb-item active">All Books</li>
                            </ol>
                        </div>
                        <h4 class="page-title">All Books</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-custom">
                            <h4 class="h5 text-white">
                                @if(isset($author))
                                    {{ $author->firstname."'s Book List" }}
                                @elseif(isset($_GET['search']))
                                    Search result for "{{ $_GET['search'] }}"
                                @else
                                    List of Books
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    @isset($author)
                                        <a class="btn btn-custom" href="{{ route('admin.author', ['id' => $author->id]) }}"><i class="fa fa-arrow-circle-left"></i> Back to Author's Profile</a>
                                    @endisset
                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="btn btn-custom" href="{{ route('admin.book.new') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Date Created</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = (isset($_GET['page']) && $_GET['page'] != 1) ? 10*($_GET['page']-1)+1 : 1; ?>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $row++ }}</td>
                                                <td><img src="{{ ($book->image != '') ? asset('storage/'.$book->image) : asset('img/image-370x500.jpg') }}" class="img-thumbnail" style="max-width:65px;"></td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ ucwords(\App\Models\Book::getCategoryName($book->category_id)) }}</td>
                                                <td>{{ number_format($book->price, 2) }}</td>
                                                <td>{{ $book->created_at }}</td>
                                                <td><a class="btn btn-sm btn-custom" href="{{ route('admin.book', ['id' => $book->id]) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-3">
                                <div class="col-auto">
                                    {{ $books->appends($_GET)->links() }}
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