@extends('layouts.app', ['activePage' => 'user.order', 'title' => 'Book Reader'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="text-center mb-3">
                    <h2>{{ $book->title }}</h2>
                </div>
                <object class="pdf" data="{{ asset('storage/books/files/'. $book->book_file) .'#toolbar=0' }}"
                    width="800" height="500"></object>
                <div id="book_reader"></div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('custom-scripts')

@endpush