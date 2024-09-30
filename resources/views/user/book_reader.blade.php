@extends('layouts.app', ['activePage' => 'user.order', 'title' => 'Book Reader'])

@section('content')
<section class="tg-sectionspace tg-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                {{--@if(session('book_file_path'))--}}
                <object  class="pdf" data="https://media.geeksforgeeks.org/wp-content/cdn-uploads/20210101201653/PDF.pdf#toolbar=0"
                    width="800" height="500"></object>
                {{--@endif--}}
            </div>
        </div>
    </div>
</section>
@endsection
