@extends('layouts.app', ['activePage' => 'user.wishlist', 'title' => 'Wishlist'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default shadow">
                    <div class="panel-heading"><h4>Saved Items</h4></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Book Title</th>
                                        <th>Category</th>
                                        <th>Price (₦)</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $row = 1; @endphp
                                    @foreach ($books as $book)
                                        @php $slug = \App\Models\Book::getSlug($book->title); @endphp
                                        <tr>
                                            <td>{{ $row++ }}</td>
                                            <td><img src="{{ asset('storage/'.$book->image) }}" style="max-width:50px;"></td>
                                            <td><a href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}">{{ ucwords($book->title) }}</a></td>
                                            <td>{{ \App\Models\Book::getCategoryName($book->category_id) }}</td>
                                            <td>{{ number_format($book->price, 2) }}</td>
                                            <td>
                                                -
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
