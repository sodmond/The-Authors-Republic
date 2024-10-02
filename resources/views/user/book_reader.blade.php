@extends('layouts.app', ['activePage' => 'user.order', 'title' => 'Book Reader'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="tg-sectionhead" style="padding-right:10px !important;">
                    <h2 style="padding-top:15px;">{{ $book->title }}</h2>
                    <div style="float:right;">
                        <a class="tg-btn tg-active" href="{{ route('user.order', ['id' => $order->id, 'code' => $order->code]) }}">
                            Back to Order Details</a>
                    </div>
                </div>
                <object class="pdf mb-3" data="{{ asset('storage/books/files/'. $book->book_file) .'#toolbar=0' }}"
                    width="800" height="500"></object>
                <div id="book_reader" class="text-center">
                    @php $slug = \App\Models\Book::getSlug($book->title); @endphp
                    <a class="tg-btn tg-active" href="{{ route('book', ['id' => $book->id, 'slug' => $slug]) }}" target="_blank">Write a Review</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('custom-scripts')

@endpush